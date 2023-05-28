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
                'description' => 'Admin users have full control over the e-commerce platform. They manage the entire system, including product management, inventory management, user management, and website configuration.'
            ],
            [
                'title' => 'Blogger',
                'slug' => 'blogger',
                'description' => 'A blogger is an individual who creates and maintains a blog, which is a regularly updated website or platform where they publish content in a reverse chronological order.'
            ],
            [
                'title' => 'Store Owner',
                'slug' => 'store-owner',
                'description' => 'In some e-commerce platforms, store owners have additional privileges to set up and manage their own individual stores within the platform. They can add products, configure pricing and discounts, and manage their store settings.'
            ],

            [
                'title' => 'Seller/Merchant',
                'slug' => 'seller_merchant',
                'description' => 'Users who operate their own online store within the e-commerce platform. They can add products, manage inventory, process orders, and handle customer inquiries related to their products.'
            ],
            [
                'title' => 'Customer Support',
                'slug' => 'customer-support',
                'description' => 'Users who handle customer inquiries, provide support, and resolve issues related to products, orders, or general inquiries.'
            ],
            [
                'title' => 'Customer/User',
                'slug' => 'customer-user',
                'description' => 'These are the regular users of the e-commerce platform who browse products, make purchases, and interact with the website or mobile app.'
            ],
            [
                'title' => 'Affiliate Partner',
                'slug' => 'affiliate-partner',
                'description' => ' Users who promote products or refer customers to the e-commerce platform and earn a commission or rewards based on successful referrals or sales.'
            ],
            [
                'title' => 'Supplier/Vendor',
                'slug' => 'supplier_vendor',
                'description' => 'Users who provide products or services to the e-commerce platform. They manage their own inventory, product listings, and order fulfillment.'
            ],
            [
                'title' => 'Guest',
                'slug' => 'guest',
                'description' => ' Users who visit the e-commerce site without creating an account. They can browse products and add items to the cart but may have limited access to certain features.'
            ],
            [
                'title' => 'Registered User',
                'slug' => 'registered-user',
                'desription' => ' Users who have created an account on the e-commerce platform. They can log in, manage their profile, view order history, and access personalized features.'
            ]
        ];
        DB::table('roles')->insert($role_list);
    }
}
