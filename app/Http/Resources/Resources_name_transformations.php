<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resources_name_transformations extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'number'=>$this->number,
            'name' => $this->name,
            'DirectionsOfExpenses'=>DirectionsOfExpensesResource::collection($this->DirectionsOfExpenses),
            
        ];
    }
}
