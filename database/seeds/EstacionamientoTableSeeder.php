<?php

use Illuminate\Database\Seeder;
use App\Estacionamiento;
use Illuminate\Database\Facades\DB;

class EstacionamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estacionamiento::class)->create([
            'nombre'=>'Olimpica',
        ]);

        factory(Estacionamiento::class)->create([
            'nombre'=>'Revolucion',
        ]);

        factory(Estacionamiento::class)->create([
            'nombre'=>'Boulevard',
        ]);
    }
}
