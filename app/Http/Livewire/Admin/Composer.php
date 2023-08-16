<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Composer as ComposerModel;

class Composer extends Component
{
    public function render()
    {
        $composerlist = ComposerModel::paginate(20);
		return view('livewire.admin.composer', compact('composerlist'))->layout('layouts.master');

        //return view('livewire.admin.composer');
    }

    
  
}
