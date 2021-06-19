<?php

namespace App\Models;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table    = "citas";
    protected $fillable = [
        'doctor_id',
        'paciente_id',
        'fecha',
        'hora',
        'nota',
        'status',
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id');
    }
}
