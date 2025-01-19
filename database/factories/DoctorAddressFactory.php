<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorAddress>
 */
class DoctorAddressFactory extends Factory
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
            'addressline1' => fake()->address(),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
        ];
    }
}
