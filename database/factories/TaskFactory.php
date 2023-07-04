<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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

        $user = User::inRandomOrder()->first();
        $project = Project::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'project_id' => $project->id,
            'title' => fake()->sentence(),
            'description' => fake()->sentence(10),
            'deadline' => fake()->date(),
            'status' => $status
        ];
    }
}
