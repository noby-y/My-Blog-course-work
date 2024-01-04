<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the category with the name 'Default' already exists
        $defaultCategory = Category::where('name', 'Default')->first();

        // If 'Default' category doesn't exist, create it
        if (!$defaultCategory) {
            Category::create([
                'name' => 'Default',
            ]);
        }
    }
}
