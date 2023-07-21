<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SongCategory extends Component
{

   public function render()
	{
		return view('livewire.admin.song-category')->layout('layouts.master');
	}
}
