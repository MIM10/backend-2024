<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::insert([
            [
                'name' => 'Agus',
                'gender' => 'M',
                'phone' => '081234567890',
                'address' => 'Jl. Kemandoran No. 5, Jakarta',
                'email' => 'agus@gmail.com',
                'status' => 'active',
                'hired_on' => '2023-01-10',
            ],
            [
                'name' => 'Dimas',
                'gender' => 'M',
                'phone' => '082345678901',
                'address' => 'Jl. Mangga Dua No. 8, Bandung',
                'email' => 'dimas@gmail.com',
                'status' => 'inactive',
                'hired_on' => '2022-05-15',
            ]
        ]);
    }
}
