<?php

use Illuminate\Database\Seeder;
use \App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name' =>'Admin',
            'category_details' =>'new category',
        ]);
        Category::create([
            'category_name' =>'Admin',
            'category_details' =>'new category',
        ]);
        Category::create([
            'category_name' =>'Admin',
            'category_details' =>'new category',
        ]);
    }
}
