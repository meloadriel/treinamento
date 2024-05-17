<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get("/index", [ContatoController::class, 'index'])->name('contatos.index');

Route::get('/', function () {
    return view('welcome');
});
