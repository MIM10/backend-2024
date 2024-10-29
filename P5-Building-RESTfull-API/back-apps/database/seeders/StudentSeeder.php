<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student')->insert([
            [
                "nama" => "fikri",
                "nim" => "0002",
                "email" => "fikri@gmail.com",
                "jurusan" => "SI",
            ]
        ]);
    }
}
