<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_list = [
            [
                'title' => 'Admin',
                'slug' => 'admin',
                'description' => 'This is the admin'
            ],
            [
                'title' => 'Moderator',
                'slug' => 'moderator',
                'description' => 'This is the moderator'
            ],
            [
                'title' => 'Seller',
                'slug' => 'seller',
                'description' => 'This is the seller'
            ],
            [
                'title' => 'User',
                'slug' => 'user',
                'description' => 'This is a user'
            ]
        ];

        DB::table('roles')->insert($role_list);
    }
}
