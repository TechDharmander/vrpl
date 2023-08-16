<?php

namespace App\Http\Livewire\User;

use Auth;
use Livewire\Component;
use App\Models\Song;

class AllReleases extends Component
{
    // public $status;
    public function render()
    {
        $status = request()->status;
    	$userid = Auth()->user()->id;
    	$songsList = Song::where('user_id', $userid)
                    ->where('status', '=', $status)
                    ->latest()
                    ->paginate(20);
        return view('livewire.user.all-releases', compact('songsList'))->layout('layouts.master');
    }
}
