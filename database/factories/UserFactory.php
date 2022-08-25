<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'email' => $this->faker->email,
            // 'email_verified_at' => now(),
            'password' => bcrypt('asdfghjkl'), // password
            'remember_token' => Str::random(10),
            'jabatan' => $this->faker->jobTitle,
            'kontak' => '082350476227',
            'alamat' => $this->faker->address,
            'role' => 'Admin',
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }


}
