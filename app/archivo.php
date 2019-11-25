<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
    protected $fillable = ['modelo_id', 'modelo_type', 'original', 'hash', 'mime', 'tamaño'];

    public function modelo()
    {
        return $this->morphTo();
    }
}
