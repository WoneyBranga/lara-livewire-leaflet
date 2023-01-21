<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mapa', function () {
    return view('mapa');
});
Route::get('/consulta', function () {
    return view('consulta');
});
Route::get('/teste', function () {


    $long = -48.58;
    $lat = -27.59;


    $query = 'SELECT
                    e."ID",
                    ST_Distance(e.geom, ST_SetSRID(ST_MakePoint(:long,:lat), 4326)::geography) as distancia,
                    e."LAT",
                    e."LONG",
                    e.geom
                FROM "ESTACOES_BR_201222" e
                WHERE
                ST_DWithin(e.geom, ST_SetSRID(ST_MakePoint(:long,:lat), 4326)::geography, 200000)
                ORDER BY 2 ASC
                LIMIT 1;';

    $results = DB::select($query, [':long' => $long, ':lat' => $lat]);

    dd($results);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
