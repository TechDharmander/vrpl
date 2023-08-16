<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Livewire\Component;
use App\Traits\Toastr;
use App\Models\{User, Country, State, City};

class Allusers extends Component
{
    use Toastr;
    public $user_id, $name, $username, $email, $phone_number, $city, $state, $country, $role, $status;
    public $countries, $states, $cities;
    protected $listener = [
      'resetModalForm'
  ];

  public function resetModalForm()
  {
      $this->resetErrorBag();
      $this->name = '';
      $this->email = '';
      $this->phone_number = '';
      $this->username = '';
      $this->selected_id = '';
  }


    public function edit($id)
	{
		  try {
          $user = User::findorfail($id);
          $this->name = $user->name;
          $this->email = $user->email;
          $this->phone_number = $user->phone_number;
          $this->username = $user->username;
          $this->selected_id = $user->id;
          dd($user);
          $this->updateCategoryMode = true;
          $this->dispatchBrowserEvent('showModel');
      } catch (Exception $e) {
          $message = $e->getMessage();
          $this->showToastr($message, 'error');
      }
	}

  public function render()
  {

    $alluser = User::where('role','user')->with(['country','state','city'])->orderBy('id','desc')->paginate(20);      
  
    return view('livewire.admin.allusers', compact('alluser'))->layout('layouts.master');

  }

}
