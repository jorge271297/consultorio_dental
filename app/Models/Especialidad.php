<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = "especialidades";

    protected $fillable = [
        'especialidad',
        'descripcion'
    ];

    public function doctores() {
        return $this->belongsToMany(Doctor::calass, 'doctores_especialidades', 'especialidad_id', 'doctor_id')->withTimestamps();
    }
}
