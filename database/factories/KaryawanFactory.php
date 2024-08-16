<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nik" => fake()->numberBetween(0, 100),
            "nama_karyawan" => fake()->name(),
            "jabatan" => fake()->randomElement(['SM', 'leader', 'crew sertifikasi', 'crew']),
            "jenis_kelamin" => fake()->randomElement(['laki-laki', 'perempuan']),
            "email" => fake()->safeEmail(),
        ];
    }
}
