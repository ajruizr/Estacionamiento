<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    protected $fillable = ['nombre','lugar'];

    public function lugars()
    {
        return $this->hasMany('App\Lugar');
    }
}
