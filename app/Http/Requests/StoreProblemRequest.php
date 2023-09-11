<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProblemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo("add problem");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user' => "required|exists:users,id",
            "description" => "required|min:2",
            "price" => "numeric",
            "paid" => "numeric",
            "due_time" => "",
            "device_name" => "required_if:is_new_device,on",
            "branch" => "exists:branches,id"
        ];
    }
}
