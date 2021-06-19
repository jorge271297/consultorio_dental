<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Utilities\Helper;
use Illuminate\Http\Request;

class CitaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            Cita::create($request->all());
            return Helper::response(201, "Se creo el registro correctamente.");
        } catch (\Exception $e) {
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita) {
        $cita->doctor;
        $cita->paciente;
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita) {
        try {
            $cita->update($request->all());
            return Helper::response(201, "Se actualizo el registro correctamente.");
        } catch (\Exception $e) {
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita) {
        try {
            $cita->delete();
            return Helper::response(201, "Se eliminó el registro correctamente.");
        } catch (\Exception $e) {
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }
}
