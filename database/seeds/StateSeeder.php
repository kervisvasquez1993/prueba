<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Carabobo',
            'country_id' => '1'
        ]);

        DB::table('states')->insert([
            'name' => 'Aragua',
            'country_id' => '1'
        ]);
    }
}
