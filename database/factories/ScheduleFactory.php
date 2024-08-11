<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "karyawan_id" => Karyawan::factory(),
            "posisi" => fake()->randomElement(['sic', 'mod', 'leader', 'leader/kitchen', 'kitchen', 'kasir', 'lobby']),
            "tanggal" => fake()->date(),
            "jam_masuk" => fake()->randomElement(['12', '09', '15', '23', '07', '17' . 'off']),
            "jam_pulang" => fake()->randomElement(['17', '23', '13', '07', '15', '20', '18', 'off']),
        ];
    }
}
