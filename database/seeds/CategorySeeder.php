<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Pastas', 'image' => 'images/category/aW7QdeF3zjgziYPIy0T3whHDIYgKvOQzlFRyVQpD.png', 'order' => 'AA']);
        Category::create(['name' => 'Barbotinas', 'image' => 'images/category/Barbotinas.png', 'order' => 'BB']);
        Category::create(['name' => 'Materiales Sólidos', 'image' => 'images/category/Materiales_Sólidos.png', 'order' => 'CC']);
    }
}
