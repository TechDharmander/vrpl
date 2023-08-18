<?php

namespace App\Http\Livewire\Admin;

use Auth;
use Livewire\Component;
use App\Traits\Toastr;
use App\Models\{User, Country, State, City};
use App\Helpers\Helper;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;
class Allusers extends Component
{
    use Toastr;
    public $user_id, $name, $username, $email, $phone_number,$password, $city, $state, $country, $role, $status;
    public $countries, $states, $cities,$selected_id;

    protected $listener = [
        'resetModalForm'
    ];


    public function mount(){
      $this->countries = Country::all();
      $this->states =  collect();
      $this->cities =  collect();
    }

    public function resetModalForm(){
      $this->resetErrorBag();
      $this->name = '';
      $this->email = '';
      $this->phone_number = '';
      $this->username = '';
      $this->selected_id = '';
    }
	public function updateUser()
	{
		$this->validate([
			'name' => 'required'
		]);
       
        $update_user = User::find($this->selected_id);
        $update_user->name = $this->name;
        $update_user->email=  $this->email;
        $update_user->phone_number= $this->phone_number;
        $update_user->country = $this->country;
        $update_user->state = $this->state;
        $update_user->city =$this->city;
      
        $saved = $update_user->save();
        $this->showToastr('This user update successfully.', 'success');
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
  public function addnewUser(){

        $this->validate([
          'username' => 'required|unique:users,username',
        ]);
        $this->validate([
          'country' => 'required',
        ]);
        $this->validate([
          'state' => 'required',
        ]);
        $this->validate([
          'city' => 'required',
        ]);
        
        $save_user = new User();
        $save_user->username = $this->username;
        $save_user->name = $this->name;
        $save_user->role = UserRoleEnum::USER->value;
        $save_user->email=  $this->email;
        $save_user->password= Hash::make($this->password);
        $save_user->phone_number= $this->phone_number;
        $save_user->country = $this->country;
        $save_user->state = $this->state;
        $save_user->city =$this->city;
        $save_user->status ='1';

        $saved = $save_user->save();
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');		
	}



    public function edit($id)
	  {
		try {

        $user = User::findorfail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->username = $user->username;

        $this->country = $user->country;
        $this->countries  = Country::all();

        $this->states = State::where('country_id',  $this->country)->get();
        $this->state = $user->state;

        $this->cities = City::where('state_id', $this->state)->get();
        $this->city = $user->city;
               
        $this->selected_id = $user->id;
        $this->dispatchBrowserEvent('showModel');

    } catch (Exception $e) {
        $message = $e->getMessage();
        $this->showToastr($message, 'error');
    }
	}

  public function delete($id)
	{
		try {
            $user = User::findorfail($id);
            $delete = $user->delete();
            $this->showToastr('This user  deleted successfully.', 'success');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}


  public function updatedCountry($country){
    $this->states = State::where('country_id', $country)->get();
  }

  public function updatedState($state){
    $this->cities = City::where('state_id', $state)->get();
  }

  public function render(){
 
    $alluser = User::where('role','user')->with(['country','state','city'])->paginate(20);      
    return view('livewire.admin.allusers', compact('alluser'))->layout('layouts.master');

  }

}
