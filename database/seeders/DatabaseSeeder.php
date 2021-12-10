<?php

namespace Database\Seeders;

use App\Models\Technician;
use App\Models\User;
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


        $this->call(CitySeeder::class);
        $this->call(ProfessionSedeer::class);
        $this->call(TechnicianSeeder::class);
        $this->call(UserSeeder::class);

        User::factory(10)->create();


    }
}
