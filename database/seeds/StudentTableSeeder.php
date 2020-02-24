<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 10) as $index) {
            Student::create([
                'stdId' => $faker->text(10),
                'endedHours' => $faker->numberBetween(1,150),
                'addressId' => $faker->numberBetween(1,10),
                'niche' => $faker->randomElement(['SD','MM','CS','IS','MO']),
                'userId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
