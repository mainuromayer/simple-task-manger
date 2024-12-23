<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['name' => 'Project 1', 'project_code' => 'P001'],
            ['name' => 'Project 2', 'project_code' => 'P002'],
            ['name' => 'Project 3', 'project_code' => 'P003'],
            ['name' => 'Project 4', 'project_code' => 'P004'],
            ['name' => 'Project 5', 'project_code' => 'P005'],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
