<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
<<<<<<< HEAD
    
=======
    /**
     * Define the model's default state.
     *
     * @return array
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
<<<<<<< HEAD
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
=======
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
            'remember_token' => Str::random(10),
        ];
    }

<<<<<<< HEAD
    
=======
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
