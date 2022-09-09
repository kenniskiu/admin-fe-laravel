<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'full_name' => "ken",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ],
            [
                'full_name' => "lukas",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ],
            [
                'full_name' => "aryo",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ],
            [
                'full_name' => "ibnu",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ],
            [
                'full_name' => "Rizki",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ],
            [
                'full_name' => "Azis",
                'program'  => "Kampus Gratis",
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
