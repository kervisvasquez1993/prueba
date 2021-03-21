<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kervis Vasquez',
            'email' => 'kervisvasquez24@gmail.com',
            'password' => '123456789',
            'email_verified_at' => Carbon::now(),
            'phone' => '+584244444161',
            'identify_card' => '25672732',
            'country_id ' => 1,
            'state_id' => 1,
            'city_id' => 1,
            'birthdate' => Carbon::now()

        ]);

    }
}
