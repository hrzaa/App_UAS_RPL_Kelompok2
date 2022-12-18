<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['L', 'P']);
        // $faker = Faker\Factory::create();
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->nik(),
            'email' => $this->faker->email(),
            'jenis_kelamin' => $gender,
            'alamat' => $this->faker->address(),
        ];
    }
}
