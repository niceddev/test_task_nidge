<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create(app()->getLocale());

        for ($i = 1; $i <= 300; $i++) {
            $user = [
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => $faker->password,
                'rank' => rand(0, 100),
            ];

            Redis::hmset('user:' . $user['id'], $user);
        }

    }

}
