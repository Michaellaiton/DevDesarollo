<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/login-google', [ClientController::class, 'redirectToGoogle']);
Route::get('/google-callback', [ClientController::class, 'handleGoogleCallback']);
Route::get('/form-Registrer', [ClientController::class, 'createGoogle'])->name('clients.google');
Route::post('/form-Registrer', [ClientController::class, 'store'])->name('clients.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',  [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/import', [ClientController::class, 'importClient'])->name('clients.importClient');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/clients/create', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/import', [ClientController::class, 'import'])->name('clients.import');
    Route::put('/clients/edit/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);

});


Route::get('/notification', [MailController::class, 'sendEmail'])->name('notification');
