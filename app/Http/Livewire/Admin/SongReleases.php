<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Song;

class SongReleases extends Component
{
	
    public function render()
    {
    	$songsList = Song::orderBy('id', 'DESC')->paginate(20);
        return view('livewire.admin.song-releases', compact('songsList'))->layout('layouts.master');
    }
}
