<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SongSubcategory extends Component
{
    public function render()
    {
        return view('livewire.admin.song-subcategory')->layout('layouts.master');
    }
}
