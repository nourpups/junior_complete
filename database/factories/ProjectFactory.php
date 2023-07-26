<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusArray  = [Status::IN_PROGRESS, Status::COMPLETED, Status::ABANDONED];
        $status = $statusArray[array_rand($statusArray)];

        $client = Client::inRandomOrder()->first();

        return [
            'client_id' => $client->id,
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(),
            'deadline' => fake()->date(),
            'status' => $status
        ];
    }
}
