<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Couple>
 */
class CoupleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'         => $this->faker->uuid,
            'husband_id' => User::factory()->male()->create()->id,
            'wife_id'    => User::factory()->female()->create()->id,
            'manager_id' => User::factory()->create()->id,
        ];
    }
}
