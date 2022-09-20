<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'id' => '2d22215f-f56d-4c7e-9c3c-ed0d71371e9c',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
