<?php

use Illuminate\Database\Seeder;
use App\Excuse;
class ExcusesTableSeeder extends Seeder
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
            Excuse::create([
                'date' => $faker->date('Y-m-d'),
                'excuse' => $faker->text,
                'stdId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
