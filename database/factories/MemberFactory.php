<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'username' => $faker->userName,
            'email' => $faker->email,
            'no_hp' => $faker->phoneNumber,
            'gender' => rand(0, 1),
            'alamat' => $faker->address,
            'created_at' => $faker->dateTime('now'),
            'updated_at' => $faker->dateTime('now'),
        ];
    }
}
