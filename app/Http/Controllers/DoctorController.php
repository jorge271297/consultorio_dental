<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Utilities\Helper;
use Illuminate\Http\Request;
use App\Utilities\UploadedImage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;

class DoctorController extends Controller {
    use UploadedImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $doctores = Doctor::paginate(5);
        return response()->json($doctores, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request) {
        try {
            DB::beginTransaction();
            $data = $request->except('especialidades');
            if ($request->exists("foto")) {
                $this->inputName = "foto";
                $this->saveAvatarFrom($request);
                $data["foto"] = $this->filePath;
            }

            $doctor = Doctor::create($data);

            if ($request->exists('especialidades')) {
                $doctor->especialidades()->attach($request->especialidades);
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
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor) {
        $doctor->edad           = Carbon::parse($doctor->fecha_nacimiento)->age;
        $doctor->especialidades = $doctor->especialidades;

        return response()->json($doctor, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor) {
        try {
            DB::beginTransaction();
            $data = $request->except('especialidades');
            if ($request->exists("foto")) {
                $this->inputName = "foto";
                if ($doctor->foto != null) {
                    $this->saveAvatarFrom($request, $doctor->foto);
                } else {
                    $this->saveAvatarFrom($request);
                }
                $data["foto"] = $this->filePath;
            }

            $doctor->update($data);

            if ($request->exists('especialidades')) {
                if (count(array_diff($request->especialidades, $this->getPivot($doctor->id))) > 0) {
                    $especialidades = $this->getPivot($doctor->id);
                    $doctor->especialidades()->detach($especialidades);
                    $doctor->especialidades()->toggle($request->especialidades);
                }
            }
            DB::commit();
            return Helper::response(201, "Se actualizo el registro correctamente.");
        } catch (\Exception $e) {
            DB::rollback();
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor) {
        try {
            $doctor->delete();
            return Helper::response(201, "Se eliminó el registro correctamente.");
        } catch (\Exception $e) {
            return Helper::response(500, "Ocurrió un error en el servidor, póngase en contacto con el departamento de soporte.");
        }
    }

    private function getPivot($doctor_id) {
        $data = [];

        $alergias = DB::table('doctores_especialidades')
            ->select('especialidad_id')
            ->where('doctor_id', '=', $doctor_id)
            ->get();

        if ($alergias->count()) {
            foreach ($alergias as $item) {
                array_push($data, $item->especialidad_id);
            }
        }

        return $data;
    }
}
