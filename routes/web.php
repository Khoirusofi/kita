<?php

use App\Models\Musik;
use App\Models\Galeri;
use App\Models\Content;

use App\Models\Carousel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Kita\MusikController as KitaMusikController;
use App\Http\Controllers\Kita\GaleriController as KitaGaleriController;
use App\Http\Controllers\Kita\ContentController as KitaContentController;
use App\Http\Controllers\Kita\CarouselController as KitaCarouselController;
use App\Http\Controllers\Kita\DashboardController as KitaDashboardController;


Route::get('/', function () {
    // Mengambil semua data dari database
    $carousels = Carousel::all();
    $contents = Content::all();
    $galeris = Galeri::all();
    $musiks = Musik::all(); // Mengambil semua data musik

    // Mengirim data ke view kita.index
    return view('kita.index', compact('carousels', 'contents', 'galeris', 'musiks'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')
    ->prefix('admins')
    ->name('admins.')
    ->group(function () {
        Route::get('/', [KitaDashboardController::class, 'index'])->name('dashboard');
        Route::resource('admins', KitaDashboardController::class)->only(['index']);
        Route::resource('carousel', KitaCarouselController::class)->except(['show']);
        Route::resource('contents', KitaContentController::class)->except(['show']);
        Route::resource('galeris', KitaGaleriController::class)->except(['show']);
        Route::resource('musiks', KitaMusikController::class)->except(['show']);

    });

require __DIR__.'/auth.php';
