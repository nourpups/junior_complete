<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Project::factory(5)->create()->each(function ($project) {
           $user_ids = User::inRandomOrder()->take(rand(1,3))->pluck('id')->toArray();
           $project->users()->attach($user_ids);
        });

    }
}
