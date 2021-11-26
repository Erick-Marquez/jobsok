<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->unique()->numerify('9#########'),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->streetAddress,

            'quantity_of_jobs' => $this->faker->numberBetween(0, 50),
            'experience' => $this->faker->text,

            'city_id' => City::all()->random()->id
        ];
    }

    public function technicianWithOneProfession(){
        return $this->state(function (array $attributes) {
            return [
                'document' => $this->faker->unique()->numerify('########'),
                'identification_document_id' => 1
            ];
        });
    }
}
