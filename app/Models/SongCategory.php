<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongCategory extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title','slug','short_title','keypoints','description'
    ];


    public function subcategory()
    {
    	return $this->hasMany(SongSubcategory::class,'category_id');
    }
}
