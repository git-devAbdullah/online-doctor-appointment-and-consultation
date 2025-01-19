<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorAddress>
 */
class TimeslotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctors = collect(Doctor::get()->modelKeys());
        return [
            'doctor_id' => $doctors->random(),
            "dateTime" => fake()->dateTime(),
            "duration" => fake()->numberBetween(15,30),
        ];
    }
}
