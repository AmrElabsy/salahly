<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeekendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		return auth()->user()->hasPermissionTo("add weekend");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'days' => ['required', 'array', 'min:1'],
            'days.*' => ['in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday'],
        ];
    }
}
