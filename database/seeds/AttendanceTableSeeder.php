<?php

use Illuminate\Database\Seeder;
use App\Attendance;

class AttendanceTableSeeder extends Seeder
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
            Attendance::create([
                'date' => $faker->date('Y-m-d'),
                'startWork' => $faker->time('H:m'),
                'endWork' => $faker->time('H:m'),
                'comment' => $faker->text,
                'studentUserId' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
