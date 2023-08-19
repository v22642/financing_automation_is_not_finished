<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectionsOfExpensesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'name_transformation_id' => $this->name_transformation_id,
            'direction_of_spending' => $this->direction_of_spending,
            'total_approved' => $this->total_approved,
            '11_agree' => $this->{'11_agree'},
            '12_agree' => $this->{'12_agree'},
            '13_agree' => $this->{'13_agree'},
            'subproject_kpі' => $this->subproject_kpі,
            'name_and_value' => $this->name_and_value,
            'plan' => $this->plan,
            'fact' => $this->fact,
            'abcd' => $this->abcd,
            'LegalAdministration'=> $this->LegalAdministration

        ];
    }
}
