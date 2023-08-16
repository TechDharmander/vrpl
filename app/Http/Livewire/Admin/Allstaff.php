<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Auth;
use App\Traits\Toastr;
use App\Models\{User, Country, State, City};

class Allstaff extends Component
{


    use Toastr;
    public $user_id, $name, $username, $email, $phone_number, $city, $state, $country, $role, $status;

   

    public function render()
    {

      $allstaff = User::where('role','aggregator')->with(['country','state','city'])->paginate(20);
     // echo "<pre>";
     
      //var_dump( $alluser->toArray());
      return view('livewire.admin.allstaff', compact('allstaff'))->layout('layouts.master');

    }
}
