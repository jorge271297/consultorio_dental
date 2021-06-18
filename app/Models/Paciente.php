<?php

namespace App\Models;

use App\Models\Alergia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "pacientes";

    protected $fillable = [
        'foto',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'sexo',
        'peso',
        'altura',
        'estado',
        'municipio',
        'colonia',
        'domicilio',
        'codigo_postal',
        'email',
        'telefono_fijo',
        'telefono_movil',
    ];

    public function alergias(){
        return $this->belongsToMany(Alergia::class, 'alergias_pacientes', 'paciente_id', 'alergia_id')->withTimestamps();
    }

}
