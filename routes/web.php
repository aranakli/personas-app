<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PaisController;
use App\Models\Comuna;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Pais;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas para Comunas
    Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');
    Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
    Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');
    Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
    Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');
    Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

    // Rutas para Municipios
    Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios.index');
    Route::post('/municipios', [MunicipioController::class, 'store'])->name('municipios.store');
    Route::get('/municipios/create', [MunicipioController::class, 'create'])->name('municipios.create');
    Route::delete('/municipios/{municipio}', [MunicipioController::class, 'destroy'])->name('municipios.destroy');
    Route::put('/municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');
    Route::get('/municipios/{municipio}/edit', [MunicipioController::class, 'edit'])->name('municipios.edit');

    // Rutas para Departamentos
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
    Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
    Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
    Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');
    Route::put('/departamentos/{departamento}', [DepartamentoController::class, 'update'])->name('departamentos.update');
    Route::get('/departamentos/{departamento}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');

    // Rutas para Paises
    Route::get('/paises', [PaisController::class, 'index'])->name('paises.index');
    Route::post('/paises', [PaisController::class, 'store'])->name('paises.store');
    Route::get('/paises/create', [PaisController::class, 'create'])->name('paises.create');
    Route::delete('/paises/{pais}', [PaisController::class, 'destroy'])->name('paises.destroy');
    Route::put('/paises/{pais}', [PaisController::class, 'update'])->name('paises.update');
    Route::get('/paises/{pais}/edit', [PaisController::class, 'edit'])->name('paises.edit');

    // Rutas para Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
