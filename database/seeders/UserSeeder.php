<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Movie CMS';
        $lastName = "Laravel App";
        $email = "admin@movie.cms";
        $verified = now();
        $password = "123456";
        $role = 'admin';

        User::create([
            'name' => $name,
            'last_name' => $lastName,
            'email' => $email,
            'email_verified_at' => $verified,
            'password' => Hash::make($password),
            'role' => $role
        ]);

        //Fakers Users
        $createFakers = (bool) true;
        if($createFakers){

            $createFakersLimit = 25;

            for($i=0; $i < $createFakersLimit; $i++){
                $faker = Faker::create();

                //Make User
                $name = $faker->firstName();
                $lastName = $faker->lastName();
                $email = $faker->email();
                $verified = now();
                $password = $faker->password(6, 8);
                $role = 'user';

                User::create([
                    'name' => $name,
                    'last_name' => $lastName,
                    'email' => $email,
                    'email_verified_at' => $verified,
                    'password' => Hash::make($password),
                    'role' => $role
                ]);

            }
        }

    }
}
