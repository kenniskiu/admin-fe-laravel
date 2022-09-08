<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "nama",
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "nama",
                'email' => 'azis@admin.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
