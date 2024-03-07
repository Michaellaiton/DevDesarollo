<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ejemplo;
use App\Http\Controllers\EjemploController;
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
    Route::get('/notification', [MailController::class, 'sendEmail'])->name('notification');
    Route::get('/calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

});


Route::get('/notification', [MailController::class, 'sendEmail'])->name('notification');

Route::get('/calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::patch('/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');


// routes/web.php




// Route::resources([
//     'calendar' => CalendarController::class,
// ]);

// Route::get('/calendar', [CalendarController::class, 'index']);
// Route::get('/events', [CalendarController::class, 'getEvents']);
// Route::post('/events', [CalendarController::class, 'createEvent']);
