<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('professions')->insert([
            ['description' => 'Gasfitero'],
            ['description' => 'Carpintero'],
            ['description' => 'Pintor'],
            ['description' => 'Electricista'],
            ['description' => 'Cerrajero'],
            ['description' => 'Constructor'],
        ]);

    }
}
