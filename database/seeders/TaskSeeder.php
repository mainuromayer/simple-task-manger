<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['task_name' => 'Task 1', 'description' => 'Description 1', 'project_id' => 1, 'status' => 'pending'],
            ['task_name' => 'Task 2', 'description' => 'Description 2', 'project_id' => 1, 'status' => 'done'],
            ['task_name' => 'Task 3', 'description' => 'Description 3', 'project_id' => 2, 'status' => 'working'],
            ['task_name' => 'Task 4', 'description' => 'Description 4', 'project_id' => 2, 'status' => 'done'],
            ['task_name' => 'Task 5', 'description' => 'Description 5', 'project_id' => 3, 'status' => 'working'],
            ['task_name' => 'Task 6', 'description' => 'Description 6', 'project_id' => 3, 'status' => 'working'],
            ['task_name' => 'Task 7', 'description' => 'Description 7', 'project_id' => 4, 'status' => 'done'],
            ['task_name' => 'Task 8', 'description' => 'Description 8', 'project_id' => 4, 'status' => 'pending'],
            ['task_name' => 'Task 9', 'description' => 'Description 9', 'project_id' => 5, 'status' => 'working'],
            ['task_name' => 'Task 10', 'description' => 'Description 10', 'project_id' => 5, 'status' => 'pending'],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
