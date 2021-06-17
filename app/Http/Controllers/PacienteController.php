<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(5);
        return response()->json($pacientes, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = null;
        try {
            DB::beginTransaction();
                $paciente = Paciente::create($request->except('alergias'));

                if($request->exists('alergias')) {
                    $paciente->alergias()->attach($request->alergias);
                }
            DB::commit();
        }catch(Exception $e) {
            DB::rollback();
        }

        $paciente->alergias = $paciente->alergias;

        return response()->json($paciente, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
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
    public function update(Request $request, Paciente $paciente)
    {
        try {
            DB::beginTransaction();
                $paciente->update($request->except('alergias'));

                if($request->exists('alergias')) {
                    $alergias = $this->getPivot($paciente->id);
                    $paciente->alergias()->detach($alergias);
                    $paciente->alergias()->toggle($request->alergias);
                }
            DB::commit();
        }catch(Exception $e) {
            DB::rollback();
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
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json($paciente, 200);
    }

    private function getPivot($paciente_id) {
        $data = [];

        $alergias = DB::table('alergias_pacientes')
        ->select('alergia_id')
        ->where('paciente_id', '=',  $paciente_id)
        ->get();

        if($alergias->count()) {
            foreach($alergias as $item) {
                array_push($data, $item->alergia_id);
            }
        }

        return $data;
    }
}
