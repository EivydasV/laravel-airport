<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];
    public function airport(){
        return $this->belongsTo(Airport::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
