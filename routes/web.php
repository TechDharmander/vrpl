<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Aggregator\{AggregatorDashboard,AggregatorProfile};
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\Admin\{AdminDashboard, SongCategory, SongSubcategory, Genre, Composer, Producers, Artists, Lyricists, SongReleases,AdminProfile,Allusers,Allstaff};
use App\Http\Livewire\User\{UserDashboard,SongRelease,AllReleases,SingleSongRelease,UserProfile};
use App\Http\Livewire\Approval\{ApprovalDashboard,ApprovalController,ApprovalProfile};
use App\Http\Livewire\Finance\{FinanceDashboard,FinanceProfile};
use App\Http\Livewire\Promotion\{PromotionDashboard,PromotionProfile};
use App\Http\Livewire\Planner\{PlannerDashboard,PlannerProfile};
use App\Helpers\Helper;
Route::get('/', function(){
	return view('welcome');
});


//Auth::routes(['verify'=>true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('user-dashboard');  

    Route::get('/song-release', SongRelease::class)->name('song-release'); 
    Route::get('/single-song-release', SingleSongRelease::class)->name('single-song-release');
    // Route::get('/all-releases', AllReleases::class)->name('all-releases');
    Route::get('/profile', UserProfile::class)->name('profile.edit');
    Route::patch('/profile', [UserProfile::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfile::class, 'destroy'])->name('profile.destroy');
    Route::get('/send-verification-mail', function(){
      return view('reverification');
    })->name('send-verification-mail');

    //////////////////////////////////////End Approval/////////////////////////////////////////////////////////////

    Route::prefix('approval')->name('approval.')->group(function() {
      Route::get('profile', ApprovalProfile::class)->name('profile.edit');
      Route::get('dashboard',  ApprovalDashboard::class)->name('approval-dashboard');
      Route::get('panding',  ApprovalController::class)->name('songs-panding');
      Route::get('approved',  ApprovalController::class)->name('songs-approved');
      Route::get('onhold',  ApprovalController::class)->name('songs-onhold');
     
    });
//////////////////////////////////////End Approval/////////////////////////////////////////////////////////////

//////////////////////////////////////Admin/////////////////////////////////////////////////////////////

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
//////////////////////////////////////End Admin/////////////////////////////////////////////////////////////

//////////////////////////////////////Aggregator/////////////////////////////////////////////////////////////
    Route::prefix('aggregator')->name('aggregator.')->group(function() {
      Route::get('/profile', AggregatorProfile::class)->name('profile.edit');
		  Route::get('dashboard',  AggregatorDashboard::class)->name('aggregator-dashboard');
    });
//////////////////////////////////////End Aggregator/////////////////////////////////////////////////////////////



Route::prefix('finance')->name('finance.')->group(function() {
  Route::get('/profile', FinanceProfile::class)->name('profile.edit');
  Route::get('dashboard',  FinanceDashboard::class)->name('finance-dashboard');
});


Route::prefix('promotion')->name('promotion.')->group(function() {
  Route::get('/profile', PromotionProfile::class)->name('profile.edit');
  Route::get('dashboard',  PromotionDashboard::class)->name('promotion-dashboard');
});

Route::prefix('planner')->name('planner.')->group(function() {
  Route::get('/profile', PlannerProfile::class)->name('profile.edit');
  Route::get('dashboard',  PlannerDashboard::class)->name('planner-dashboard');
});

  Route::post('/loginadmin', function() {
    $res=appHelper::loginAdmin();
    if($res){  return redirect()->intended('admin/dashboard');   }
  })->name('loginadmin');
});



require __DIR__.'/auth.php';

//php artisan make:livewire Planner/PlannerDashboard