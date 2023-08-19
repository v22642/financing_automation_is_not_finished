<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameTransformation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'number',
        'name',
        
    ];
    public function DirectionsOfExpenses(){
        return $this->hasMany(Directions_of_expenses::class);
    }
    
}
