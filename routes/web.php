<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QualityControlController;
use App\Http\Controllers\PerformanceController;


// 404 fallback
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Halaman publik
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/animasi', 'blok.animasi')->name('animasi');
Route::view('/web-design', 'blok.website_design')->name('web-design');
Route::view('/foto-video', 'blok.foto_video')->name('foto-video');
Route::view('/desain-percetakan', 'blok.desain_percetakan')->name('desain-percetakan');

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback.form');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/kehadiran-kinerja', function () {
    return view('form.form_kehadiran');
})->name('attendance.create');
Route::post('/kehadiran-kinerja', [AttendanceController::class, 'store'])->name('attendance.store');

Route::get('/logbook', function () {
    return view('form.logbook_kegiatan');
})->name('logbook.form');
Route::post('logbook', [LogbookController::class, 'store'])->name('logbook.store');

Route::view('/quality-control', 'form.quality_control')->name('quality-control');
Route::view('/skill-passport', 'form.paspor_skill')->name('skill-passport');

Route::get('/cek-performa', [PerformanceController::class, 'index'])->name('cek.performa');
Route::post('/cek-performa', [PerformanceController::class, 'show'])->name('cek.performa.show');



// Admin Panel (Protected)
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        //dashboard
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
            ->name('dashboard');

        // route siswa
        Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
        Route::get('/data-siswa/create', [SiswaController::class, 'create'])->name('data-siswa.create');
        Route::post('/data-siswa', [SiswaController::class, 'store'])->name('data-siswa.store');
        Route::get('/data-siswa/{id}/edit', [SiswaController::class, 'edit'])->name('data-siswa.edit');
        Route::put('/data-siswa/{id}', [SiswaController::class, 'update'])->name('data-siswa.update');
        Route::delete('/data-siswa/{id}', [SiswaController::class, 'destroy'])->name('data-siswa.destroy');

        // kehadiran
        Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran');


        //saran
        Route::get('/saran', [FeedbackController::class, 'index'])->name('saran');
        Route::get('/admin/saran', [FeedbackController::class, 'index'])->name('admin.saran');
        Route::post('/saran/store', [FeedbackController::class, 'store'])->name('feedback.store');
        Route::delete('/admin/saran/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

        Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.saran');
        Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

        //logbook
        Route::get('/logbook', [LogbookController::class, 'index'])->name('logbook');
        Route::delete('/logbook/{id}', [LogbookController::class, 'destroy'])->name('logbook.destroy');

        // Quality Control
        Route::resource('qc', QualityControlController::class);
    });


// Profile user biasa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Auth Routes (Login/Register/Reset)
require __DIR__ . '/auth.php';