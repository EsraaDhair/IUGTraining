<?php

use Illuminate\Database\Seeder;
use App\Password;
use Illuminate\Support\Facades\Hash;

class PasswordTableSeeder extends Seeder
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
            Password::create([
                'password' => Hash::make("123456"),
                'userId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
