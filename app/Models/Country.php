<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'code'];

    public function airlines(){
        return $this->hasMany(Airline::class);
    }
    public function airport(){
        return $this->hasMany(Airport::class);
    }
}
