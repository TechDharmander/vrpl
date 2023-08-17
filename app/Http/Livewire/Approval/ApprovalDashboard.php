<?php

namespace App\Http\Livewire\Approval;

use Livewire\Component;

class ApprovalDashboard extends Component
{
    public function render()
    {
        return view('livewire.approval.approval-dashboard')->layout('layouts.master');
        
    }
}
