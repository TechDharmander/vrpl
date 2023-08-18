<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Enums\UserRoleEnum;
use App\Models\{User, Country, State, City};
use Illuminate\Support\Facades\Session;
class Helper{

   public static function isrcCode(){
      $isrcCode =DB::select("select MAX(CAST(REPLACE(REPLACE(isrc_code , 'VR', ''), '', '') as int)) as isrc from songs");

      if(is_null($isrcCode[0]->isrc)){
         $isrc_code="VR1001";
      }else{
         $isrc_code='VR'.($isrcCode[0]->isrc + '1');
      }

      return  $isrc_code;
   }

   public static function reSendVerification($userid){
      $user = User::find($userid);
      $user->sendEmailVerificationNotification();
   }

   public static function chackVerification(){

      $user = User::find(Auth::id());

      $roll=UserRoleEnum::USER->value;
      if($roll==$user->role){
         if(!is_null($user->email_verified_at)){
            return 'verified';
         }else{
            return 'notverified';
         }
      }
      else{
         return 'verified';
      }
   }

   public static function loginAdmin(){

      if(Session::get('superadmin')){
         $user = User::find(Session::get('superadmin'));
         Auth::login($user);
         Session::put('superadmin', '');
         return true;
      }else{
         return false;
      }
      return false;
  }


}
