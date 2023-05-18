<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_list = [
            [
                'title' => 'कवक रोग प्रबंधन',
                'slug' => 'fungal-disease-infection',
                'image' => 'category.jpg',
                'description' => 'Orchard disease management refers to the strategies and practices used to prevent, diagnose, and control diseases in fruit orchards. Orchard diseases can cause significant economic losses by reducing crop yields, fruit quality, and tree longevity.'
            ],
            [
                'title' => 'कीट रोग प्रबंधन',
                'slug' => 'pest-disease-management',
                'image' => 'category.jpg',
                'description' => 'Orchard disease management refers to the strategies and practices used to prevent, diagnose, and control diseases in fruit orchards. Orchard diseases can cause significant economic losses by reducing crop yields, fruit quality, and tree longevity.'
            ],
            [
                'title' => 'पोषण प्रबंधन',
                'slug' => 'nutrition-management',
                'image' => 'category.jpg',
                'description' => 'Nutrition management in an orchard refers to the practices and strategies used to ensure that the trees receive the proper nutrients they need for optimal growth and fruit production.'
            ],
            [
                'title' => 'फसल और फसल के बाद के प्रबंधन',
                'slug' => 'harvest-and-post-harvest-management',
                'image' => 'category.jpg',
                'description' => 'This includes practices such as proper timing of harvest, careful handling and storage of the fruit, and grading and sorting to ensure that the fruit is of high quality and meets market standards.'
            ],
            [
                'title' => 'बाग प्रबंधन',
                'slug' => 'orchard-management',
                'image' => 'category.jpg',
                'description' => 'Orchard cultivation refers to the careful management of the orchard soil in such a way that the soil is maintained in a good condition suitable to the needs of the tree with least expenses.'
            ],
            [
                'title' => 'मृदा प्रबंधन',
                'slug' => 'soil-management',
                'image' => 'category.jpg',
                'description' => 'Soil management in an orchard involves practices that help maintain soil health and fertility to support healthy tree growth and fruit production',
            ],
            [
                'title' => 'स्प्रे प्रबंधन',
                'slug' => 'spray-managment',
                'image' => 'category.jpg',
                'description' => 'Spray management refers to the process of controlling the application of sprays, such as pesticides, herbicides, and fungicides, to plants or crops in order to maximize their effectiveness while minimizing their potential negative impacts on the environment and human health.'
            ]

        ];
        DB::table('categories')->insert($category_list);
    }
}
