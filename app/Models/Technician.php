<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
        'address',

        'have_warranty',

        'quantity_of_jobs',
        'experience',

        'city_id',
    ];


    public function professions(){
        return $this->belongsToMany(Profession::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    
}
