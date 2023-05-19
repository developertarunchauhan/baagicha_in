<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * User with admin privileges
         */
        DB::table('users')->insert([
            'name' => 'Admin Chauhan',
            'handle' => 'admin-chauhan',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);
        /**
         * User with Moderator privileges
         */
        DB::table('users')->insert([
            'name' => 'Moderator Chauhan',
            'handle' => 'moderator-chauhan',
            'email' => 'moderator@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('moderator@123'),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        /**
         * User with Seller privileges
         */
        DB::table('users')->insert([
            'name' => 'Seller Chauhan',
            'handle' => 'seller-chauhan',
            'email' => 'seller@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('seller@123'),
            'remember_token' => Str::random(10),
            'role_id' => 3
        ]);

        /**
         * Common users / visitors
         */
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name . "-" . $i,
                'handle' => $faker->word . "-" . $i,
                'email' => 'user_' . $i . '@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user_' . $i . '@123'),
                'remember_token' => Str::random(10),
                'role_id' => rand(3, 4),
            ]);
        }
    }
}
