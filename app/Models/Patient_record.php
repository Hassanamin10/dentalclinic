<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_record extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'martial_status',
        'address',
        'occupation',
        'gender',
        'dental_chief_complaint',
        'birth_place',
        'date_of_birth',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teeth()
    {
        return $this->belongsToMany(Tooth::class, 'patient_teeth')
            ->withPivot('created_at', 'updated_at');
    }
}
