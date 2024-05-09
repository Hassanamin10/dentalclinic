<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'num_of_tooth',
        'name',
        'position',
        'diagnosis',
    ];

    public function patientRecords()
    {
        return $this->belongsToMany(PatientRecord::class, 'patient_teeth')
            ->withPivot('created_at', 'updated_at');
    }
}
