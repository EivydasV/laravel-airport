<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'country', 'latitude', 'longitude', 'airline_id'];

    public function airlines(){
        return $this->hasMany(Airline::class);
    }
}
