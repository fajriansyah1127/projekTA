<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asuransi>
 */
class AsuransiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_asuransi' =>  $this->faker->company(),
            'email_asuransi' => $this->faker->email(),
            'kontak_asuransi' => $this->faker->phoneNumber(),
            'alamat_asuransi' => $this->faker->address(),
            'status_asuransi' => 'Tidak Berlaku',
        ];
    }
}
