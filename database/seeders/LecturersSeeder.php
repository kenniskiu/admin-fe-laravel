<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecturers')->insert([
            [
                'name' => "ken",
                'is_lecturer'  => true,
                'is_mentor'  => true,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "lukas",
                'is_lecturer'  => true,
                'is_mentor'  => true,
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
