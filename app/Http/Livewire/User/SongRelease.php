<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class SongRelease extends Component
{
    public function render()
    {
        return view('livewire.user.song-release')->layout('layouts.master');
    }
}
