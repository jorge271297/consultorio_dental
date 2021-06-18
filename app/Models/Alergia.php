<?php

namespace App\Models;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alergia extends Model
{
    use HasFactory;
    protected $table = "alergias";

    protected $fillable = [
        'alergia',
        'descripcion'
    ];

    public function pacientes() {
        return $this->belongsToMany(Paciente::class, 'alergias_pacientes', 'alergia_id', 'paciente_id')->withTimestamps();
    }
}
