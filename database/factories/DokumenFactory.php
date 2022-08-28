<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokumen>
 */
class DokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                    'nama_dokumen' => $this->faker->name(),
                    'nomor_dokumen' => $this->faker->ean13(),
                    'outlet_dokumen' =>$this->faker->numberBetween($min = 1, $max = 10),
                    'tanggal_dokumen' =>  $this->faker->date(),
                    'produk_dokumen' => '14',
                    'file_dokumen' => UploadedFile::fake()->create('test4.pdf', 1024),
        ];
    }
}
