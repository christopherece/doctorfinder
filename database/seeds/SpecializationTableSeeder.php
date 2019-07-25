<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('App\Specialization');

        for ($i = 1; $i <= 20; $i++){
            DB::table('specializations')->insert([
                'name' => $faker->jobTitle()
            ]);
        }

    }
}
