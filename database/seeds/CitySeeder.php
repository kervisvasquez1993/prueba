<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Valencia',
            'state_id' => "1"
        ]);

        DB::table('cities')->insert([
            'name' => 'Guacara',
            'state_id' => "1"
        ]);
        DB::table('cities')->insert([
            'name' => 'Maracay',
            'state_id' => "2"
        ]);
    }
}
