<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title','slug','short_title','keypoints','description'
    ];
}
