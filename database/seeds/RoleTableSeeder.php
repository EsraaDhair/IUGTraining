<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
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
            Role::create([
                'type' => $faker->randomElement(['supervisor', 'student','admin']),
                'userId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
