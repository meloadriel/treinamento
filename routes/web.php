<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get("/index", [ContatoController::class, 'index'])->name('contatos.index');

Route::get('/create', [ContatoController::class, 'create'])->name('contatos.create');

Route::get('/', function () {
    return view('welcome');
});
