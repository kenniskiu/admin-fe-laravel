<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Subject;
use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        Subject::create([
            'name'=>$faker->name,
            'number_of_sessions'=>$faker->numberBetween(5,7),
            'degree'=>$faker->word($maxNbChars = 2),
            'level'=>$faker->randomElement(['s2', 's1','d3']),
            'lecturer'=>$faker->randomElement(['{677743df-08db-4acd-8c51-dfec018301f8}', '{677743df-08db-4acd-8c51-acvs018301f8}','{677743df-0421b-4acd-8c51-dfec018301f8}']),
            'description'=>$faker->text($maxNbChars = 10),
            'credit'=>$faker->numberBetween(1,9),
        ]);
    }
}
