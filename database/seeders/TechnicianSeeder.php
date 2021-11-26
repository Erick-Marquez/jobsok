<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $technicians = Technician::factory(100)->create();

        foreach ($technicians as  $technician) {

            $numberOfProfession = rand(1, 2);

            $professions = [];

            if ($numberOfProfession == 1 ) {
                $professions = [rand(1, 4)];
            }

            if ($numberOfProfession == 2 ) {
                $professions = [rand(1, 2), rand(3, 4)];
            }
            
            $technician->professions()->attach($professions);

        }

    }
}
