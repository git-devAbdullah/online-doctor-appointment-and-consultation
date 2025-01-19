<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Timeslot;
use App\Models\DoctorAddress;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'gender',
        'dob',
        'image',
        'bio',
        'services',
        'specialization',
        'education',
        'experience',
        'fee',
        'department_id',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'services' => 'array',
        'specialization' => 'array',
        'education' => 'array',
        'experience' => 'array',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function address(){
        return $this->hasOne(DoctorAddress::class);
    }
    public function timeslots(){
        return $this->hasMany(Timeslot::class);
    }
}
