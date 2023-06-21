<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo("add customer");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:3",
            "phones" => "required|array",
            "phones.*" => "numeric|starts_with:0|digits:11"
        ];
    }
    
    public function messages() {
        $message = [];
        foreach ($this->get("phones", []) as $key => $value) {
            $message["phones"][$key] = $value;
        }
//        dd($message);
        return $message;
    }
}
