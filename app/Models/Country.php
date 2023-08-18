<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{State,User};


class Country extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->hasOne(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
