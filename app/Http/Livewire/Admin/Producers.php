<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Producer as ProducerModel;

class Producers extends Component
{
    public function render()
    {
  
        $producerslist = ProducerModel::paginate(20);
		return view('livewire.admin.producers', compact('producerslist'))->layout('layouts.master');

    }
}
