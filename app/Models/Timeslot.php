<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;
    protected $fillable = [
        "doctor_id",
        "dateTime",
        "duration",
    ];

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
}
