<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Utilities\Helper;
use App\Utilities\UploadedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller {
    use UploadedImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pacientes = Paciente::paginate(5);
        return response()->json($pacientes, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $data = $request->except('alergias');
            if ($request->exists("foto")) {
                $this->inputName = "foto";
                $this->saveAvatarFrom($request);
                $data["foto"] = $this->filePath;
            }

            $paciente = Paciente::create($data);

            if ($request->exists('alergias')) {
                $paciente->alergias()->attach($request->alergias);
            }
            DB::commit();
            return Helper::response(201, "Se creó el registro correctamente.");
        } catch (\Exception $e) {
            DB::rollback();
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente) {
        $paciente->alergias = $paciente->alergias;

        return response()->json($paciente, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente) {
        try {
            DB::beginTransaction();
            $data = $request->except('alergias');
            if ($request->exists("foto")) {
                $this->inputName = "foto";
                if ($paciente->foto != null) {
                    $this->saveAvatarFrom($request, $paciente->foto);
                } else {
                    $this->saveAvatarFrom($request);
                }
                $data["foto"] = $this->filePath;
            }

            $paciente->update($data);

            if ($request->exists('alergias')) {
                if (count(array_diff($request->alergias, $this->getPivot($paciente->id))) > 0) {
                    $alergias = $this->getPivot($paciente->id);
                    $paciente->alergias()->detach($alergias);
                    $paciente->alergias()->toggle($request->alergias);
                }
            }
            DB::commit();
            return Helper::response(201, "Se actualizo el registro correctamente.");
        } catch (\Exception $e) {
            DB::rollback();
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }

        $paciente->alergias = $paciente->alergias;

        return response()->json($paciente, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente) {
        try {
            $paciente->delete();
            return Helper::response(201, "Se eliminó el registro correctamente.");
        } catch (\Exception $e) {
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    private function getPivot($paciente_id) {
        $data = [];

        $alergias = DB::table('alergias_pacientes')
            ->select('alergia_id')
            ->where('paciente_id', '=', $paciente_id)
            ->get();

        if ($alergias->count()) {
            foreach ($alergias as $item) {
                array_push($data, $item->alergia_id);
            }
        }

        return $data;
    }
}
