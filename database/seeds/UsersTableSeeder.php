<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 10) as $index) {

            User::create([
                "name" => $faker->name,
                'email' => $faker->email,
                'mobile' => $faker->numberBetween(1000,23445),
            ]);
        }
    }
}
