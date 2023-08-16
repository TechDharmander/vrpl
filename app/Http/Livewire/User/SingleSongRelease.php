<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
// use Owenoj\LaravelGetId3\GetId3;
// Use wapmorgan\Mp3Info\Mp3Info;
use App\Models\{Song,SongCategory as Songcategory,SongSubcategory as Songsubcategory,Artist,Composer,Lyricist,Producer,Genre, User, Language};

class SingleSongRelease extends Component
{
	use WithFileUploads;

	public $isrc_code;
	public $user_id, $label;
	public $audio, $thumbnail, $song_name, $album_name, $adult=0, $song_duration, $category, $subcategory, $genre, $language, $artist, $featured_artist, $composer, $lyricist, $producer, $description, $caller_tune_name, $caller_tune_timing, $date_for_live, $status, $terms1, $terms2;
	public $categories, $subcategories,$artists,$featured_artists,$composers, $lyricists,$producers,$genres, $languages;
	public $lang,$artist_name, $spotify, $apple, $genre_name, $composer_name, $producer_name, $lyricist_name;
	public $plateforms = ['indian_dsps'];
	public $totalStep = 4;
	public $currentStep = 1;

	protected $listeners = [
		'refresh-me' => '$refresh',
		'resetForm',
		'updateSongName',
		'updateSongDuration'
	];

	public function resetForm()
	{
		$this->resetErrorBag();
        $this->lang = '';
        $this->artist_name = '';
        $this->spotify = '';
        $this->apple = '';
        $this->genre_name = '';
        $this->composer_name = '';
        $this->producer_name = '';
        $this->lyricist_name = '';
	}
	public function mount()
	{
		$this->categories = Songcategory::orderBy('id', 'DESC')->get();
		$this->subcategories = collect();
		$this->artist = collect(); 
		$this->featured_artist = collect();
		// $this->languages = Language::orderBy('id', 'DESC')->get();
		$this->artists = Artist::orderBy('id', 'DESC')->get();
		$this->featured_artists = Artist::orderBy('id', 'DESC')->get();
		$this->composers = Composer::orderBy('id', 'DESC')->get();
		$this->lyricists = Lyricist::orderBy('id', 'DESC')->get();
		// $this->producers = Producer::orderBy('id', 'DESC')->get();
		// $this->genres = Genre::orderBy('id', 'DESC')->get();
	}
	public function updatedCategory($category)
	{
		$this->subcategories = Songsubcategory::where('category_id', $category)->get();
	}
	public function addLanguage()
	{
		$this->validate([
			'lang' => 'required|string|unique:languages,lang',
		]);

		$langAdd = Language::insert(['lang' => $this->lang]);
		if($langAdd){
			$this->showToastr('Language added successfully.','success');
		}else{
			$this->showToastr('Failed to add language.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function addGenre()
	{
		$this->validate([
			'genre_name' => 'required|string|unique:genres,title',
		]);

		$added = Genre::insert(['title' => $this->genre_name]);
		if($added){
			$this->showToastr('Genre added successfully.','success');
		}else{
			$this->showToastr('Failed to add genre.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function addComposer()
	{
		$this->validate([
			'composer_name' => 'required|string|unique:composers,name',
		]);

		$added = Composer::insert(['name' => $this->composer_name]);
		if($added){
			$this->showToastr('Composer added successfully.','success');
		}else{
			$this->showToastr('Failed to add Composer.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function addProducer()
	{
		$this->validate([
			'producer_name' => 'required|string|unique:producers,name',
		]);

		$added = Producer::insert(['name' => $this->producer_name]);
		if($added){
			$this->showToastr('Producer added successfully.','success');
		}else{
			$this->showToastr('Failed to add Producer.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function addLyricist()
	{
		$this->validate([
			'lyricist_name' => 'required|string|unique:lyricists,name',
		]);

		$added = Lyricist::insert(['name' => $this->lyricist_name]);
		if($added){
			$this->showToastr('Lyricist added successfully.','success');
		}else{
			$this->showToastr('Failed to add lyricist.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function addArtist()
	{
		$this->validate([
			'artist_name' => 'required|unique:artists,name',
		]);

		$added = Artist::insert(['name' => $this->artist_name,'spotify'=>$this->spotify,'apple'=>$this->apple]);
		if($added){
			$this->showToastr('Artist added successfully.','success');
		}else{
			$this->showToastr('Failed to add artist.','error');
		}
		$this->resetForm();
		$this->dispatchBrowserEvent('hideModel');
	}
	public function increaseStep()
	{
		$this->resetErrorBag();
		$this->validateData();
		$this->currentStep++;
		if($this->currentStep > $this->totalStep){
			$this->currentStep = $this->totalStep;
		}
	}
	public function decreaseStep()
	{
		$this->resetErrorBag();
		$this->currentStep--;
		if($this->currentStep < 1){
			$this->currentStep = 1;
		}
	}
	public function validateData()
	{
		if($this->currentStep == 1){
			$this->validate([
				'audio' => 'required|mimes:mp3,mpeg,wav,m4a,flac,mp4,wma,aac',
				'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
				'terms1' => 'required',
				'terms2' => 'required'
			]);
		} 
		if($this->currentStep == 2){
			$this->validate([
				'song_name' => 'required',
				'album_name' => 'required',
				'song_duration' => 'required',
				'category' => 'required',
				'subcategory' => 'required',
				'genre' => 'required',
				'language' => 'required',
				'artist' => 'required',
				'featured_artist' => 'required',
				'composer' => 'required',
				'lyricist' => 'required',
				'description' => 'required',
				'caller_tune_name' => 'required',
				'caller_tune_timing' => 'required',
				'date_for_live' => 'required',
				'label' => 'required'
			]);
		} 
		if($this->currentStep == 3){
			$this->validate([
				'plateforms' => 'required'
			]);
		} 
	}
	public function updateSongName($name)
	{
		$this->song_name = $name;
		$this->album_name = $name;
		$this->caller_tune_name = $name;
	}
	public function updateSongDuration($duration)
	{
		$this->song_duration = $duration;
	}
	public function addRelease()
	{
		$user_id = Auth::user()->id;
		$image = '';
		if(!empty($this->thumbnail)){
			$extension = $this->thumbnail->getClientOriginalExtension();
			$name = Str::random(16).'.'.$extension;
		   	Storage::disk('public')->put($name, $this->thumbnail);
		   	$image = $this->thumbnail->store('images','public');
		}
		$aud = '';
		if(!empty($this->audio)){
			$extension = $this->audio->getClientOriginalExtension();
			$name = Str::random(16).'.'.$extension;
            Storage::disk('public')->put($name, $this->audio);
            // $img_name[] = $name;
            $aud = $this->audio->store('audios','public');
		}
		$artistList = implode(',', $this->artist );
		$featuredList = implode(',', $this->featured_artist );
		$plateformList = implode(',', $this->plateforms);

		$data = ['song_name'=>$this->song_name,'album_name'=>$this->album_name,'song_duration'=>$this->song_duration,'category'=>$this->category,'subcategory'=>$this->subcategory,'genre'=>$this->genre,'language'=>$this->language,'artist'=>$artistList,'featured_artist'=>$featuredList,'composer'=>$this->composer,'lyricist'=>$this->lyricist,'description'=>$this->description,'caller_tune_name'=>$this->caller_tune_name,'caller_tune_timing'=>$this->caller_tune_timing,'date_for_live'=>$this->date_for_live,'label_id'=>$this->label,'isrc_code'=>$this->isrc_code,'thumbnail'=>$image,'audio'=>$aud,'user_id'=>$user_id,'status'=>'draft','plateforms' => $plateformList];
		// dd($data);
		$insert = Song::insert($data);
		if($insert){
			$this->showToastr('Song upload successfully.','success');
		}else{
			$this->showToastr('Failed to upload song.','error');
		}
		return redirect()->to('/song-release');
	}
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
    public function render()
    {
        return view('livewire.user.single-song-release')->layout('layouts.master');
    }
}
