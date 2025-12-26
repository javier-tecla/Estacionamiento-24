<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


// Rutas para ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->name('admin.ajustes.index')->middleware('auth');
Route::post('/admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->name('admin.ajustes.create')->middleware('auth');

// Rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/rol/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/rol/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.role.update')->middleware('auth');
Route::delete('/admin/rol/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.role.delete')->middleware('auth');

// Rutas para los usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::post('/admin/usuario/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.usuario.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuaerios/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.usuarios.destroy')->middleware('auth');

