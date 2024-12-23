<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeammateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teammates = [
            ['name' => 'Teammate 1', 'email' => 'team1@gmail.com', 'employee_id' => 'EMP001', 'position' => 'Software Engineer', 'role' => 'teammate', 'password' => Hash::make('123')],
            ['name' => 'Teammate 2', 'email' => 'team2@gmail.com', 'employee_id' => 'EMP002', 'position' => 'Software Engineer', 'role' => 'teammate', 'password' => Hash::make('123')],
            ['name' => 'Teammate 3', 'email' => 'team3@gmail.com', 'employee_id' => 'EMP003', 'position' => 'Software Engineer', 'role' => 'teammate', 'password' => Hash::make('123')]
        ];

        foreach ($teammates as $teammate) {
            User::create($teammate);
        }
    }
}
