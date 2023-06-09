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
         * User with Blogger privileges
         */
        DB::table('users')->insert([
            'name' => 'Blogger Chauhan',
            'handle' => 'blogger-chauhan',
            'email' => 'blogger@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('blogger@123'),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        /**
         * User with Store Owner privileges
         */
        DB::table('users')->insert([
            'name' => 'Store Owner Chauhan',
            'handle' => 'store-owner-chauhan',
            'email' => 'storeowner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('storeowner@123'),
            'remember_token' => Str::random(10),
            'role_id' => 3
        ]);

        /**
         * User with Store Owner privileges
         */
        DB::table('users')->insert([
            'name' => 'Seller Chauhan',
            'handle' => 'seller-chauhan',
            'email' => 'seller@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('seller@123'),
            'remember_token' => Str::random(10),
            'role_id' => 4
        ]);
        /**
         * User with Seller/Merchant privileges
         */
        DB::table('users')->insert([
            'name' => 'Customer Support Chauhan',
            'handle' => 'customer-support',
            'email' => 'customersupport@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('customersupport@123'),
            'remember_token' => Str::random(10),
            'role_id' => 5
        ]);

        DB::table('users')->insert([
            'name' => 'Customer Chauhan',
            'handle' => 'customer-chauhan',
            'email' => 'customer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('customer@123'),
            'remember_token' => Str::random(10),
            'role_id' => 6
        ]);

        DB::table('users')->insert([
            'name' => 'Affiliate Partner Chauhan',
            'handle' => 'affiliate-partner',
            'email' => 'affiliatepartner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('affiliatepartener@123'),
            'remember_token' => Str::random(10),
            'role_id' => 7
        ]);
        DB::table('users')->insert([
            'name' => 'Supplier Chauhan',
            'handle' => 'supplier',
            'email' => 'supplier@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('supplier@123'),
            'remember_token' => Str::random(10),
            'role_id' => 8
        ]);
        DB::table('users')->insert([
            'name' => 'Guest Chauhan',
            'handle' => 'guest',
            'email' => 'guest@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guest@123'),
            'remember_token' => Str::random(10),
            'role_id' => 9
        ]);

        DB::table('users')->insert([
            'name' => 'Registered User Chauhan',
            'handle' => 'registered-user',
            'email' => 'registereduser@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('registereduser@123'),
            'remember_token' => Str::random(10),
            'role_id' => 10
        ]);
        DB::table('users')->insert([
            'name' => 'Student Chauhan',
            'handle' => 'student-chauhan',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('student@123'),
            'remember_token' => Str::random(10),
            'role_id' => 11
        ]);

        /**
         * Common users / visitors
         */
        // $faker = Faker::create();
        // $role_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        // for ($i = 0; $i < 50; $i++) {
        //     $name = $faker->name . "" . $faker->word;
        //     DB::table('users')->insert([
        //         'name' => $name,
        //         'handle' => Str::slug($name, "-") . '-' . strtolower(Str::random(5)),
        //         'email' => 'user_' . $i . '@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('user_' . $i . '@123'),
        //         'remember_token' => Str::random(10),
        //         'role_id' => $role_list[rand(0, 9)],
        //     ]);
        // }

        /**
         * Using factory seeding to generate users
         */

        \App\Models\User::factory(100)->create();
    }
}
