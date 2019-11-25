<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $fillable = ['horario'];

    public function lugars()
    {
        return $this->belongsToMany(Lugar::class);
    }
    
}
