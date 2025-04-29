<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\parametersController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\citiesController;
use App\Http\Controllers\leavetypesController;
use App\Http\Controllers\jobexprsController;
use App\Http\Controllers\districtsController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\leaveformsController;
use App\Http\Controllers\signproxiesController;
use App\Http\Controllers\signstagesController;
use App\Http\Controllers\signstagedetailsController;



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

Route::get('/cities', [citiesController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [citiesController::class, 'create'])->name('cities.create');
Route::post('/cities', [citiesController::class, 'store'])->name('cities.store');
Route::get('/cities/{id}/edit', [citiesController::class, 'edit'])->name('cities.edit');
Route::put('/cities/{id}', [citiesController::class, 'update'])->name('cities.update');
Route::delete('/cities/{id}', [citiesController::class, 'destroy'])->name('cities.destroy');

Route::get('/leavetypes', [leavetypesController::class, 'index'])->name('leavetypes.index');
Route::get('/leavetypes/create', [leavetypesController::class, 'create'])->name('leavetypes.create');
Route::post('/leavetypes', [leavetypesController::class, 'store'])->name('leavetypes.store');
Route::get('/leavetypes/{id}/edit', [leavetypesController::class, 'edit'])->name('leavetypes.edit');
Route::put('/leavetypes/{id}', [leavetypesController::class, 'update'])->name('leavetypes.update');
Route::delete('/leavetypes/{id}', [leavetypesController::class, 'destroy'])->name('leavetypes.destroy');

Route::get('/jobexprs', [jobexprsController::class, 'index'])->name('jobexprs.index');
Route::get('/jobexprs/create', [jobexprsController::class, 'create'])->name('jobexprs.create');
Route::post('/jobexprs', [jobexprsController::class, 'store'])->name('jobexprs.store');
Route::get('/jobexprs/{id}/edit', [jobexprsController::class, 'edit'])->name('jobexprs.edit');
Route::put('/jobexprs/{id}', [jobexprsController::class, 'update'])->name('jobexprs.update');
Route::delete('/jobexprs/{id}', [jobexprsController::class, 'destroy'])->name('jobexprs.destroy');

Route::get('/districts', [districtsController::class, 'index'])->name('districts.index');
Route::get('/districts/create', [districtsController::class, 'create'])->name('districts.create');
Route::post('/districts', [districtsController::class, 'store'])->name('districts.store');
Route::get('/districts/{id}/edit', [districtsController::class, 'edit'])->name('districts.edit');
Route::put('/districts/{id}', [districtsController::class, 'update'])->name('districts.update');
Route::delete('/districts/{id}', [districtsController::class, 'destroy'])->name('districts.destroy');

Route::get('/employees', [employeesController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [employeesController::class, 'create'])->name('employees.create');
Route::post('/employees', [employeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{employeeno}/edit', [employeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employeeno}', [employeesController::class, 'update'])->name('employees.update');
Route::patch('/employees/{employeeno}/IsBanned', [employeesController::class, 'updateIsBanned'])->name('employees.updateIsBanned');

Route::get('/leaveforms', [leaveformsController::class, 'index'])->name('leaveforms.index');
Route::get('/leaveforms/create', [leaveformsController::class, 'create'])->name('leaveforms.create');
Route::post('/leaveforms', [leaveformsController::class, 'store'])->name('leaveforms.store');
Route::get('/leaveforms/{id}/edit', [leaveformsController::class, 'edit'])->name('leaveforms.edit');
Route::put('/leaveforms/{id}', [leaveformsController::class, 'update'])->name('leaveforms.update');
Route::delete('/leaveforms/{id}', [leaveformsController::class, 'destroy'])->name('leaveforms.destroy');

Route::get('/signproxies', [signproxiesController::class, 'index'])->name('signproxies.index');
Route::get('/signproxies/create', [signproxiesController::class, 'create'])->name('signproxies.create');
Route::post('/signproxies', [signproxiesController::class, 'store'])->name('signproxies.store');
Route::get('/signproxies/{id}/edit', [signproxiesController::class, 'edit'])->name('signproxies.edit');
Route::put('/signproxies/{id}', [signproxiesController::class, 'update'])->name('signproxies.update');
Route::delete('/signproxies/{id}', [signproxiesController::class, 'destroy'])->name('signproxies.destroy');


Route::get('/signstages', [signstagesController::class, 'index'])->name('signstages.index');
Route::get('/signstages/create', [signstagesController::class, 'create'])->name('signstages.create');
Route::post('/signstages', [signstagesController::class, 'store'])->name('signstages.store');
Route::get('/signstages/{id}/edit', [signstagesController::class, 'edit'])->name('signstages.edit');
Route::put('/signstages/{id}', [signstagesController::class, 'update'])->name('signstages.update');
Route::patch('/signstages/{id}/IsUsed', [signstagesController::class, 'updateIsUsed'])->name('signstages.updateIsUsed');

Route::get('/', function() {
    return view('welcome');
});

