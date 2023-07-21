<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SongCategory as ModelSongCategory;

class AdminSongCategory extends Component
{
	public $title;
	public $selected_id;
	public $updateCategoryMode = false;

	public function addCategory()
	{
		$this->validate([
			'title' => 'required|unique:song_categories,title',
		]);
        
        $songCat = new SongCategory();
        $songCat->title = $this->title;
        $saved = $songCat->save();
	}
	public function edit($id)
	{
		dd($id);
	}
	public function delete($id)
	{
		dd($id);
	}

    public function render()
    {
    	$song_categories = ModelSongCategory::all();
        return view('livewire.admin.admin-song-category', compact('song_categories'));
    }
}
