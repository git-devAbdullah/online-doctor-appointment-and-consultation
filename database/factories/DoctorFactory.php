<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = $specialization = $education = $experience = [];

        for ($i=0; $i < fake()->numberBetween(4,10); $i++) {
            $services[] = fake()->jobTitle();
        }
        for ($i=0; $i < fake()->numberBetween(4,10); $i++) {
            $specialization[] = fake()->jobTitle();
        }

        $services = $this->generateJsonArray($services);
        $specialization = $this->generateJsonArray($specialization);

        return [
            'first_name' => fake()->firstName() ,
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make("password"),
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['male','female','others']),
            'dob' => fake()->date('Y-m-d'),
            'bio' => fake()->text(fake()->numberBetween(150,400)),
            'services' => $services,
            'specialization' => $specialization,
            'fee' => fake()->randomNumber(),
            'department_id' => fake()->numberBetween(1,8),
            'status' => fake()->numberBetween(0,1),
        ];
    }

    protected function generateJsonArray(array $values): string
    {
        return json_encode($values);
    }

}
