<?php

namespace App\Http\Livewire\Finance;

use Livewire\Component;

class FinanceDashboard extends Component
{
    public function render()
    {
     
        return view('livewire.finance.finance-dashboard')->layout('layouts.master');
    }
}
