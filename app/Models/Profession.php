<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function technicians()
    {
        return $this->belongsToMany(Technician::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_recommendation')->withPivot(["quantity"]);
    }
}
