<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('App\Doctor');

        for ($i = 1; $i <= 20; $i++){
            DB::table('doctors')->insert([
                'surname' => $faker->lastName(),
                'firstname'=> $faker->name(),
                'specialization_id' => $faker->randomDigit(),
                'department'=> implode($faker->words()),
                'contact_no'=> $faker->randomNumber()
            ]);
        }
    }
}
