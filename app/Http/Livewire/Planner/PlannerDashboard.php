<?php

namespace App\Http\Livewire\Planner;

use Livewire\Component;

class PlannerDashboard extends Component
{
    public function render()
    {
        return view('livewire.planner.planner-dashboard')->layout('layouts.master');;;
    }
}
