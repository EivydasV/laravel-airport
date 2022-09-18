<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'country_id', 'latitude', 'longitude', 'country_id'];

    public function airlines(){
        return $this->hasMany(Airline::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
