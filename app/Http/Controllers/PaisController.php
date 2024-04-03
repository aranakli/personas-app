<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae todos los registros en el objeto paises
        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear un nuevo pais
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('pais.new', ['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios del pais
        //El codigo del pais es autoincremental
        $pais = new Pais();
        $pais->pais_codi = strtoupper($request->id);
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->code;
        $pais->save();
        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();
        return view('pais.index', ['paises' => $paises]);
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
        //Edita un pais
        $pais = Pais::find($id);
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('pais.edit', ['pais' => $pais, 'municipios' => $municipios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Acualiza un pais
        $pais = Pais::find($id);
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->code;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina un Pais
        $pais = Pais::find($id);
        $pais->delete();
        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();

            return view('pais.index', ['paises' => $paises]);
    }
}
