<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estacionamiento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre','lugar'];

    public function lugars()
    {
        return $this->hasMany('App\Lugar');
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }
    public function getnombreAttribute($value)
    {
        return ucfirst($value);
    }
    public function setlugarAttribute($value)
    {
        $this->attributes['lugar'] = strtoupper($value);
    }
}
