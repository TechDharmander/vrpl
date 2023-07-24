<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AggregatorController;
use App\Http\Livewire\Admin\{AdminDashboard, SongCategory, SongSubcategory, Genre};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
	return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function() {

  		Route::get('dashboard',  AdminDashboard::class)->name('admin-dashboard');
  		Route::get('song-categories',  SongCategory::class)->name('song-category');
  		Route::get('song-subcategories',  SongSubcategory::class)->name('song-subcategory');
      Route::get('genres',  Genre::class)->name('genres');

    });

  //   Route::prefix('aggregator')->name('aggregator.')->group(function() {

		// Route::get('dashboard',  AggregatorController::class)->name('aggregator-dashboard');

  //   });
});



require __DIR__.'/auth.php';
