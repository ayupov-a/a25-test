<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lname' => $this->faker->lastName(),
            'fname' => $this->faker->firstName(),
            'sname' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'rate_per_hour' => random_int(60, 2000),
            'email_verified_at' => $this->faker->time(),
        ];
    }
}
