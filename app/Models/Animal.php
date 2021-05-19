<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public function medicalRecords()
    {
    	return $this->hasMany(MedicalRecord::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function hasMedicalRecord() {
    
	    return (bool) $this->medicalRecords()->first();
	}

    public function latestRecord()
    {
        return $this->hasOne(MedicalRecord::class)->latest();
    }
}