<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id ','label','owner_name','email','youtube','instagram','address','city_id','state_id','country_id','pincode','agreement','govtid','cancel_cheque','bank_name','branch_name','account_holder_name','account_number','ifsc_code','account_type','place_of_business','panno','gstno','gst_image','sign'
    ];

}
