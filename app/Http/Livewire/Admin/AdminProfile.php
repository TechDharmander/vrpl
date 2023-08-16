<?php

namespace App\Http\Livewire\Admin;
use Auth;
use Livewire\Component;
use App\Traits\Toastr;
use App\Models\{User, Country, State, City};

class AdminProfile extends Component
{
    use Toastr;
    public $user_id, $name, $username, $email, $phone_number, $city, $state, $country, $role, $status;
    public $countries, $states, $cities;

    public function mount(){
        $userinfo = user::find(Auth::id());
        $this->countries = Country::all();
        $this->states =  collect();
        $this->cities =  collect();

        $this->country = $userinfo->country;
        $this->states = State::where('country_id', $this->country)->get();

        
        $this->state = $userinfo->state;
        $this->cities = City::where('state_id', $this->state)->get();
        $this->city = $userinfo->city;


        $this->name = $userinfo->name;
        $this->username = $userinfo->username;
        $this->email = $userinfo->email;
        $this->phone_number = $userinfo->phone_number;
        //$this->name = $userinfo->name;
    }
    public function updatedCountry($country){
        $this->states = State::where('country_id', $country)->get();
    }
    public function updatedState($state){
        $this->cities = City::where('state_id', $state)->get();
    }

    public function render()
    { 
        $userinfo = user::find(Auth::id());      
        return view('livewire.admin.admin-profile', compact('userinfo'))->layout('layouts.master');
    }



    public function updatePropertySubmit(){

        $this->validate([
			'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
		]);

        $user = user::find(Auth::id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone_number = $this->phone_number;
        $user->country = $this->country;
        $user->state = $this->state;
        $user->city = $this->city;
        $saved = $user->save();
        $this->showToastr('Profile Information update successfully.', 'success');	


    }
}


