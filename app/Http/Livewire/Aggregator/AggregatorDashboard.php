<?php

namespace App\Http\Livewire\Aggregator;

use Livewire\Component;

class AggregatorDashboard extends Component
{
    public function render()
    {
        
        return view('livewire.aggregator.aggregator-dashboard')->layout('layouts.master');
    }
}
