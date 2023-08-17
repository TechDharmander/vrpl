<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Lyricist as LyricistsModel;
class Lyricists extends Component
{
    public function render()
    {
        
        $lyricistslist = LyricistsModel::paginate(20);
		return view('livewire.admin.lyricists', compact('lyricistslist'))->layout('layouts.master');

        //return view('livewire.admin.lyricists');
    }
}
