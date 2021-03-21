<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

}
