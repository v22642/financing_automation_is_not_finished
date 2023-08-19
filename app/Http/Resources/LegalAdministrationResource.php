<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
class LegalAdministrationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'directions_of_expenses_id' => $this->directions_of_expenses_id,
            'Deadline' => $this->Deadline,
            'Performance_information' => $this->Performance_information,
            'Total_agreed' => $this->Total_agreed,
            '21_agree' => $this->{'21_agree'},
            '22_agree' => $this->{'22_agree'},
            '23_agree' => $this->{'23_agree'},
            'Total_remaining_on_the_roadmap' => $this->Total_remaining_on_the_roadmap,
            '31_agree' => $this->{'31_agree'},
            '32_agree' => $this->{'32_agree'},
            '33_agree' => $this->{'33_agree'},
            'Procurement_method' => $this->Procurement_method,
            'Start_of_conduct' => $this->Start_of_conduct,
            'Results_of_competitive_procedures' => $this->Results_of_competitive_procedures,
            'Contract_amount_thousand_rubles' => $this->Contract_amount_thousand_rubles,
            'Contract_number' => $this->Contract_number,
            'Contract_conclusion_date' => $this->Contract_conclusion_date,
            'Responsible_person' => $this->Responsible_person,
            'Supplier' => $this->Supplier,
            'Planned_contract_amount' => $this->Planned_contract_amount,
            'Savings' => $this->Savings,
            'Delivery_date_according_to_the_contract' => $this->Delivery_date_according_to_the_contract,
            'Actual_delivery_date' => $this->Actual_delivery_date,
            'Payment_date_under_the_contract' => $this->Payment_date_under_the_contract,
            'Actual_payment_date' => $this->Actual_payment_date,
            'Accumulative_payment_amount' => $this->Accumulative_payment_amount,
            'Information_on_non_fulfillment' => $this->Information_on_non_fulfillment
        ];
    }
}
