<?php

namespace App\Http\Livewire\Promotion;

use Livewire\Component;

class PromotionDashboard extends Component
{
    public function render()
    {
        return view('livewire.promotion.promotion-dashboard')->layout('layouts.master');;
    }
}
