<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
    	'lang','slug','price','final_price','keypoints','description','no_of_songs','plan_category_id'
    ];
}
