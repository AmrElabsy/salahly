<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProblemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "description" => "required|min:2",
            "price" => "numeric",
            "paid" => "numeric",
            "due_time" => "required",
            "status" => "required|exists:statuses,id",
            "device_id" => "required|exists:devices,id",
            "branch" => "exists:branches,id"
        ];
    }
}
