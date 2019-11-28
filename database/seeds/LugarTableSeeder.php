<?php

use Illuminate\Database\Seeder;
use App\Lugar;
use Illuminate\Database\Facades\DB;
use Faker\Factory as Faker;

class LugarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lugar::create([
            'estacionamiento_id'=>'1',
            'discapacitado'=>'0',
            'disponible'=>'0',
        ]);
        Lugar::create([
            'estacionamiento_id'=>'2',
            'discapacitado'=>'1',
            'disponible'=>'0',
        ]);
        Lugar::create([
            'estacionamiento_id'=>'3',
            'discapacitado'=>'0',
            'disponible'=>'1',
        ]);
    }
}
