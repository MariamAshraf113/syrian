<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/clients', [ClientController::class, 'index'])->name('index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('create');
Route::post('/clients', [ClientController::class, 'store'])->name('store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('edit');
Route::patch('/clients/{id}', [ClientController::class, 'update'])->name('update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('destroy');

Route::get('/', function () {
    return view('welcome');
});
