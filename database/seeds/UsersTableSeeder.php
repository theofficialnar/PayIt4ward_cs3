<?php

use Illuminate\Database\Seeder;

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

        $limit = 30;

        for ($i = 0; $i < $limit; $i++){
        	DB::table('users')->insert([ //,
        		'name' => $faker->name($gender = null|'male'|'female'),
        		'employee_number' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        		'department' => $faker->company,
        		'position' => $faker->jobTitle,
        		'date_started' => $faker->date($format = 'Y-m-d', $max = 'now'),
        		'address' => $faker->address,
        		'birthday' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
        		'marital_status' => $faker->numberBetween($min = 0, $max = 1),
        		'status' => $faker->numberBetween($min = 0, $max = 3),
        		'bank_info' => $faker->ean8,
        		'email' => $faker->unique()->email,
        		'password' => bcrypt('123456')
        	]);
        }
    }
}
