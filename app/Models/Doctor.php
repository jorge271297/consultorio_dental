<?php

namespace App\Models;

use App\Models\Cita;
use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "doctores";

    protected $fillable = [
        'foto',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'cedula_profesional',
        'numero_salubridad',
        'estado',
        'municipio',
        'colonia',
        'domicilio',
        'codigo_postal',
        'telefono_fijo',
        'telefono_movil',
    ];

    public function fullName() : string {
        return $this->nombres . " " . $this->apellido_paterno . " " . $this->apellido_materno;
    }

    public function especialidades() {
        return $this->belongsToMany(Especialidad::class, 'doctores_especialidades', 'doctor_id', 'especialidad_id')->withTimestamps();
    }

    public function citas() {
        return $this->hasMany(Cita::class, 'doctor_id', 'id');
    }
}
