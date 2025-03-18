<?php

namespace App\Models;

use App\Models\Airline;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_number',
        'airline_id',
    ] ;
    public function airline(){
        return $this->belongsTo(Airline::class);
    }
    public function segments(){
        return $this->hasMany(flightSegment::class);
    }
    public function classes(){
        return $this->hasMany(FlightClass::class);
    }
    public function seats(){
        return $this->hasMany(FlightSeat::class);
    }
    public function transactions(){
        return $this->hasMany(transactions::class);
    }
}