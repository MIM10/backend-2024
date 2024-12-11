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
                "nama" => "Mucaa",
                "nim" => "0001",
                "email" => "mucaa@gmail.com",
                "jurusan" => "TI",
            ],
            [
                "nama" => "Nisa",
                "nim" => "0002",
                "email" => "nisa@gmail.com",
                "jurusan" => "SI",
            ],
        ]);
    }
}
