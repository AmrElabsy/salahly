<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo("add device");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "device_name" => "required|min:2",
            "customer_id" => "required_unless:is_new_customer,on",
            "name" => "required_if:is_new_customer,on",
            "phones" => "required_if:is_new_customer,on|array",
            "phones.*" => "numeric|starts_with:0|digits:11"
        ];
    }
}
