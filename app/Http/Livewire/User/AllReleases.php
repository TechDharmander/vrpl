<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Song;

class AllReleases extends Component
{
    public function render()
    {
    	$userid = Auth()->user()->id;
    	$songsList = Song::where('user_id', $userid)->orderBy('id', 'DESC')->paginate(20);
        return view('livewire.all-releases', compact('songsList'))->layout('layouts.master');
    }
}
