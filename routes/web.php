<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Rutas por defecto al instalar breeze*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Obtener lista
Route::get('reservas', [ReservationController::class, 'index'])->name('reserv.index');

//acceder a la vista de creación
Route::get('reservas/crear', [ReservationController::class, 'create'])->name('reserv.create_or_edit');

//Guardar datos enviados desde la vista reserv.create_or_edit
Route::post('reservas/crear', [ReservationController::class, 'store'])->name('reserv.store');

//Mostrar vista para editar
Route::get('reservas/editar/{reserv}', [ReservationController::class, 'edit'])->name('reserv.edit');

//Guardar datos enviados desde la vista reserv.create_or_edit
Route::put('reservas/actualizar/{reserv}', [ReservationController::class, 'update'])->name('reserv.update');

//Borrar
Route::delete('reservas/actualizar/{reserv}', [ReservationController::class, 'delete'])->name('reserv.delete');

require __DIR__.'/auth.php';
