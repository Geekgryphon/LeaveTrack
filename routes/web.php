<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\parametersController;

Route::get('/parameters', [parametersController::class, 'index'])->name('parameters.index');
Route::get('/parameters/create', [parametersController::class, 'create'])->name('parameters.create');
Route::post('/parameters', [parametersController::class, 'store'])->name('parameters.store');
Route::get('/parameters/{id}/edit', [parametersController::class, 'edit'])->name('parameters.edit');
Route::post('/parameters/{id}', [parametersController::class, 'update'])->name('parameters.update');
Route::delete('/parameters/{id}', [parametersController::class, 'destroy'])->name('parameters.destroy');

Route::get('/', function(){
    return view('welcome');
});

