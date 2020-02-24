<?php

use Illuminate\Database\Seeder;
use App\Supervisor;

class SupervisorTableSeeder extends Seeder
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
            Supervisor::create([
                'jobTitle' => $faker->jobTitle,
                'enterpriseId' => $faker->numberBetween(1,10),
                'userId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
