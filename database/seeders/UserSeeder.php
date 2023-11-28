<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i<=5; $i++) {  
            $faker = Faker::create();
            $user = new User;
            $user->name = $faker->name;
            $user->password = $faker->name;
            $user->email = $faker->email;
            $user->state = $faker->state;
            $user->address = $faker->address;
            $user->city = $faker->city;
            $user->contact = '9816198161';
            $user->designation = 'Developer';
            $user->department = 'IT';
            $user->save();
        }
    }
}
