<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalAdministration extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'directions_of_expenses_id',
        'Deadline',
        'Performance_information',

        'Total_agreed',
        '21_agree',
        '22_agree',
        '23_agree',

        'Total_remaining_on_the_roadmap',
        '31_agree',
        '32_agree',
        '33_agree',
        
        'Procurement_method',
        'Start_of_conduct',
        'Results_of_competitive_procedures',
        'Contract_amount_thousand_rubles',
        'Contract_number',
        'Contract_conclusion_date',
        'Responsible_person',
        'Supplier',
        'Planned_contract_amount',
        'Savings',
        'Delivery_date_according_to_the_contract',
        'Actual_delivery_date',
        'Payment_date_under_the_contract',
        'Actual_payment_date',
        'Accumulative_payment_amount',
        'Information_on_non_fulfillment'
        
    ];
}
