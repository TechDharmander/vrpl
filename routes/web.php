<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AggregatorController;
use App\Http\Livewire\Admin\{AdminDashboard, SongCategory, SongSubcategory, Genre, Composer, Producers, Artists, Lyricists, SongReleases,AdminProfile,Allusers,Allstaff};
use App\Http\Livewire\User\{UserDashboard,SongRelease,AllReleases,SingleSongRelease};
use App\Http\Livewire\Approval\{ApprovalDashboard};


Route::get('/', function(){
	return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('user-dashboard');  
    Route::get('/song-release', SongRelease::class)->name('song-release'); 
    Route::get('/single-song-release', SingleSongRelease::class)->name('single-song-release');
    Route::get('/all-releases/{status}', AllReleases::class)->name('all-releases');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('approval')->name('approval.')->group(function() {
      Route::get('dashboard',  ApprovalDashboard::class)->name('approval-dashboard');
      Route::get('/releases/{status}', AllReleases::class)->name('releases');
    });


    Route::prefix('admin')->name('admin.')->group(function() {
      Route::get('profile', AdminProfile::class)->name('profile.edit');
      Route::get('dashboard', AdminDashboard::class)->name('admin-dashboard');
      Route::get('song-releases', SongReleases::class)->name('song-releases');
      Route::get('song-categories', SongCategory::class)->name('song-category');
      Route::get('song-subcategories', SongSubcategory::class)->name('song-subcategory');
      Route::get('genres', Genre::class)->name('genres');
      Route::get('composers', Composer::class)->name('composers');
      Route::get('producers', Producers::class)->name('producers');
      Route::get('artists', Artists::class)->name('artists');
      Route::get('lyricists', Lyricists::class)->name('lyricists');
      
      Route::get('all-users',  Allusers::class)->name('all-users');
      Route::get('all-staff',  Allstaff::class)->name('all-staff');

    });

    Route::prefix('aggregator')->name('aggregator.')->group(function() {
		  Route::get('dashboard',  AggregatorController::class)->name('aggregator-dashboard');
    });
});



require __DIR__.'/auth.php';
