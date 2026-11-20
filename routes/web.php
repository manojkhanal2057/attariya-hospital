<?php

use Illuminate\Support\Facades\Route;
use App\Models\HealthPackage;
    use Illuminate\Support\Carbon;

use App\Http\Controllers\{
    HospitalController,
    AppointmentController,
    ContactController
};

// ==========================================
// HOME
// ==========================================
Route::get('/', [HospitalController::class, 'home'])
    ->name('home');

// ==========================================
// DOCTORS
// ==========================================
Route::get('/doctors', [HospitalController::class, 'doctors'])
    ->name('doctors.index');

Route::get('/doctor-{slug}', [HospitalController::class, 'doctor'])
    ->name('doctors.show');

// ==========================================
// DEPARTMENTS
// ==========================================
Route::get('/departments', [HospitalController::class, 'departments'])
    ->name('departments.index');

Route::get('/department-{slug}', [HospitalController::class, 'department'])
    ->name('departments.show');

// ==========================================
// SERVICES
// ==========================================
Route::get('/services', [HospitalController::class, 'services'])
    ->name('services.index');

Route::get('/service-{slug}', [HospitalController::class, 'service'])
    ->name('services.show');

// ==========================================
// FACILITIES
// ==========================================
Route::get('/facilities', [HospitalController::class, 'facilities'])
    ->name('facilities.index');

// ==========================================
// GALLERY
// ==========================================
Route::get('/gallery', [HospitalController::class, 'gallery'])
    ->name('gallery.index');

// ==========================================
// NEWS
// ==========================================
Route::get('/news', [HospitalController::class, 'news'])
    ->name('news.index');

Route::get('/news/{slug}', [HospitalController::class, 'newsPost'])
    ->name('news.show');

// ==========================================
// STATIC PAGES
// ==========================================
Route::get('/{name}', [HospitalController::class, 'page'])
    ->where(
        'name',
        'about|facilities|articles|contact|appointment|privacy'
    )
    ->name('page');

// ==========================================
// APPOINTMENTS
// ==========================================
Route::post('/appointment', [AppointmentController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('appointments.store');

// ==========================================
// CONTACT
// ==========================================
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contacts.store');



/*
|--------------------------------------------------------------------------
| HEALTH PACKAGES — DATABASE DRIVEN
|--------------------------------------------------------------------------
*/

// Package listing
Route::get('/packages', function () {

    $packages = HealthPackage::query()
        ->latest('id')
        ->get();

    return view('pages.packages', [
        'packages' => $packages,
        'title' => 'Health Packages | Attariya Hospital',
    ]);

})->name('packages.index');


// Package detail
Route::get('/packages/{slug}', function (string $slug) {

    $package = HealthPackage::query()
        ->where('slug', $slug)
        ->firstOrFail();

    return view('packages.show', [
        'package' => $package,
        'title' => $package->name . ' | Attariya Hospital',
    ]);

})->name('packages.show');



Route::get('/packages/{slug}', function (string $slug) {

    $package = HealthPackage::query()
        ->where('slug', $slug)
        ->firstOrFail();

    return view('packages.show', [
        'package' => $package,
        'title' => $package->name . ' | Attariya Hospital',
    ]);

})->name('packages.show');


// ==========================================
// NOTICES
// ==========================================

Route::get('/notices', [HospitalController::class, 'notices'])
    ->name('notices.index');

Route::get('/notices/{slug}', [HospitalController::class, 'notice'])
    ->name('notices.show');





Route::get('/notices/preview', function () {
    $notice = (object) [
        'title' => 'Sample Hospital Notice — Design Preview',
        'slug' => 'preview',
        'category' => 'general',
        'description' => 'This is a demonstration of the notice detail page. Actual hospital announcements will be published after approval.',
        'body' => null,
        'pdf' => null,
        'published_at' => Carbon::parse('2026-11-16'),
    ];

    return view('notices.show', [
        'notice' => $notice,
        'relatedNotices' => collect(),
        'title' => 'Notice Preview | Attariya Hospital',
        'isPreview' => true,
    ]);
})->name('notices.preview');