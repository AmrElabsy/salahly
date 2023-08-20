<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo("edit user");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email,' . request()->user->id],
            'password' => ['nullable', 'min:8'],
            'roles.*' => ['nullable', 'exists:roles,name'],
            'branches.*' => ['nullable', 'exists:branches,id'],
            'salary' => ['nullable', 'numeric', 'min:0'],
            'target' => ['nullable', 'numeric', 'min:0'],
            'percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'arrival_time' => 'nullable',
        ];
    }
}
