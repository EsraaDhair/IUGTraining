<?php

use Illuminate\Database\Seeder;
use App\Enterprise;

class EnterpriseTableSeeder extends Seeder
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
            Enterprise::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'mobile' => $faker->numberBetween(1000,23445),
                'addressID' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
