<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $fillable = ['estacionamiento_id','discapacitado','disponible'];

    public function estacionamiento()
    {
        return $this->belongsTo(Estacionamiento::class);//es equivalente a ('App\Estacionamiento')
    }
}
