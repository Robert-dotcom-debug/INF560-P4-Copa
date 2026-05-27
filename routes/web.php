<?php

use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('notas.index');
});

Route::resource('notas', NotaController::class)
    ->parameters(['notas' => 'nota']);