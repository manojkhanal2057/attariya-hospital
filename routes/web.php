<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HospitalController, AppointmentController, ContactController};

Route::get('/', [HospitalController::class, 'home'])->name('home');
Route::get('/doctors', [HospitalController::class, 'doctors'])->name('doctors.index');
Route::get('/departments', [HospitalController::class, 'departments'])->name('departments.index');
Route::get('/services', [HospitalController::class, 'services'])->name('services.index');
Route::get('/facilities', [HospitalController::class, 'facilities'])->name('facilities.index');
Route::get('/gallery', [HospitalController::class, 'gallery'])->name('gallery.index');
Route::get('/news', [HospitalController::class, 'news'])->name('news.index');
Route::get('/news/{slug}', [HospitalController::class, 'newsPost'])->name('news.show');
Route::get('/doctor-{slug}', [HospitalController::class, 'doctor'])->name('doctors.show');
Route::get('/department-{slug}', [HospitalController::class, 'department'])->name('departments.show');
Route::get('/service-{slug}', [HospitalController::class, 'service'])->name('services.show');
Route::get('/{name}', [HospitalController::class, 'page'])->where('name', 'about|facilities|articles|contact|appointment|privacy')->name('page');
Route::post('/appointment', [AppointmentController::class, 'store'])->middleware('throttle:5,1')->name('appointments.store');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contacts.store');