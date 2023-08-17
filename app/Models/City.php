<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{State,User};

class City extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
