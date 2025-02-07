<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       $projects= Project::factory()->count(10)->create();
        $users = User::all();

    // Attach users to each project
    $projects->each(function($project) use ($users) {
        // Randomly attach a few users to each project
        $project->users()->attach(
            $users->random(2)->pluck('id')->toArray() 
        );
    });

    }
}
