<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name'=>$this->faker->unique->name(),
            'email'=>$this->faker->unique->email(),
            'password'=>Hash::make('123456'),
            'rules'=>0,
        ];
    }
}
