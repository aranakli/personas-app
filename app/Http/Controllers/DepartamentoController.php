<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae todos los registros en el objeto departamento
        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear una nuevo departamento
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('departamento.new', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios del departamento
        //El codigo del departamento es autoincremental
        $departamento = new Departamento();
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;
        $departamento->save();
        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Edita un departamento
        $departamento = Departamento::find($id);
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('departamento.edit', ['departamento' => $departamento, 'paises' => $paises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Acualiza un departamento
        $departamento = Departamento::find($id);
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina un departamento
        $departamento = Departamento::find($id);
        $departamento->delete();
        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', 'tb_pais.pais_nomb')
            ->get();

            return view('departamento.index', ['departamentos' => $departamentos]);
    }
}
