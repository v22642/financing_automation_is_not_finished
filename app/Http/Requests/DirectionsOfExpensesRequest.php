<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectionsOfExpensesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_transformation_id' => 'required|exists:name_transformations,id',
            'direction_of_spending' => 'nullable|string',
            'total_approved' => 'nullable|integer',
            '11_agree' => 'nullable|integer',
            '12_agree' => 'nullable|integer',
            '13_agree' => 'nullable|integer',
            'subproject_kpі' => 'nullable|string',
            'name_and_value' => 'nullable|string',
            'plan' => 'nullable|string',
            'fact' => 'nullable|string',
            'abcd' => 'nullable|string'
        ];
    }
}
