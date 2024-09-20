<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        try {
            $mi10 = Category::create(['name' => 'Mi10', 'parent_id' => null]); // no parent
            $m11t = Category::create(['name' => 'M11t', 'parent_id' => null]); // no parent
            $m11tpro = Category::create(['name' => 'M11tpro', 'parent_id' => $m11t->id]);

            echo "Categories created successfully.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
