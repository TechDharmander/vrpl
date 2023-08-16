<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $fillables = [
    	'user_id',
    	'song_id',
    	'reason_id',
    	'remark',
    	'song_status'
    ];
}
