<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorEducation>
 */
class DoctorEducationFactory extends Factory
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
            'degree' => fake()->jobTitle(),
            'institute' => fake()->text(20),
            'from' => fake()->date('Y-m-d'),
            'to' => fake()->date('Y-m-d'),
        ];
    }
}
