<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directions_of_expenses extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name_transformation_id',
        'direction_of_spending',
        'total_approved',
        '11_agree',
        '12_agree',
        '13_agree',
        'subproject_kpі',
        'name_and_value',
        'plan',
        'fact',
        'abcd',
    ];
    public function LegalAdministration(){
        return $this->hasMany(LegalAdministration::class);
    }
    public function legalA()
    {
        return $this->hasMany(LegalAdministration::class)->onDelete('cascade'); // каскадное удаление
    }

}
