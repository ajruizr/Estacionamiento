<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->eliminadorTablas([
            'estacionamientos',
            'lugars'

        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(LugarTableSeeder::class);
        $this->call(EstacionamientoTableSeeder::class);

    }
    public function eliminadorTablas(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $tables){
            DB::table($tables)->truncate();
        }
    }
}
