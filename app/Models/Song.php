<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
    	'isrc_code','user_id ','label_id ','thumbnail','song_name','album_name','adult','song_duration','category','subcategory','genre','language','description','caller_tune_name','caller_tune_timing','date_for_live','plateforms'
    ];

    protected $casts = [
    	'status' => SongStatusEnum::class,
    ];
}
