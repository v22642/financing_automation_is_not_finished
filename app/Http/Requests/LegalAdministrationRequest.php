<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalAdministrationRequest extends FormRequest
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
            'directions_of_expenses_id' => 'required|exists:directions_of_expenses,id',
            'Deadline' => 'nullable|string',
            'Performance_information' => 'nullable|string',
            'Total_agreed' => 'nullable|integer',
            '21_agree' => 'nullable|integer',

            '22_agree' => 'nullable|integer',
            '23_agree' => 'nullable|integer',
            'Total_remaining_on_the_roadmap' => 'nullable|integer',
            '31_agree' => 'nullable|integer',
            '32_agree' => 'nullable|integer',
            '33_agree' => 'nullable|integer',
            'Procurement_method' => 'nullable|string',
            'Start_of_conduct' => 'nullable|string',
            'Results_of_competitive_procedures' => 'nullable|string',
            'Contract_amount_thousand_rubles' => 'nullable|integer',
            'Contract_number' => 'nullable|string',
            'Contract_conclusion_date' => 'nullable|string',
            'Responsible_person' => 'nullable|string',
            'Supplier' => 'nullable|string',
            'Planned_contract_amount' => 'nullable|integer',
            'Savings' => 'nullable|integer',
            'Delivery_date_according_to_the_contract' => 'nullable|string',
            'Actual_delivery_date' => 'nullable|string',
            'Payment_date_under_the_contract' => 'nullable|string',
            'Actual_payment_date' => 'nullable|string',
            'Accumulative_payment_amount' => 'nullable|integer',
            'Information_on_non_fulfillment' => 'nullable|string',
        ];
    }
}
