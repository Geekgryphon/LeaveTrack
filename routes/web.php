<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\parametersController;
use App\Http\Controllers\rolesController;

Route::get('/parameters', [parametersController::class, 'index'])->name('parameters.index');
Route::get('/parameters/create', [parametersController::class, 'create'])->name('parameters.create');
Route::post('/parameters', [parametersController::class, 'store'])->name('parameters.store');
Route::get('/parameters/{id}/edit', [parametersController::class, 'edit'])->name('parameters.edit');
Route::put('/parameters/{id}', [parametersController::class, 'update'])->name('parameters.update');
Route::delete('/parameters/{id}', [parametersController::class, 'destroy'])->name('parameters.destroy');

Route::get('/roles', [rolesController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [rolesController::class, 'create'])->name('roles.create');
Route::post('/roles', [rolesController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/edit', [rolesController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [rolesController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [rolesController::class, 'destroy'])->name('roles.destroy');


Route::get('/', function() {
    return view('welcome');
});

