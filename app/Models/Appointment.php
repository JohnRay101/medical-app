<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'appointment_datetime', 'type', 'reason'];

    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function getPatientNameAttribute()
    {
        return $this->patient->name;
    }

    public function getDoctorNameAttribute()
    {
        return $this->doctor->name;
    }
}

