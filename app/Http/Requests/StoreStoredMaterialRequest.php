<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoredMaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo("add stored_material");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'material_id' => ['required', 'exists:materials,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            "price" => "numeric",

            'buying_date' => ['required', 'date'],
        ];
    }
}
