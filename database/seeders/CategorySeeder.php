<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $categories = [
            'Artificial Turf Grass' => [],
            'Athletic Rubber' => ['Athletic', 'Athletic Rubber', 'Commercial Rubber', 'Matting', 'Playground Rubber', 'Rolled Rubber'],
            'SPECIAL' => ['LVP S1', 'Neon Carpet and Rugs S1', 'Artificial Turf Grass S1', 'Carpet Tiles S1', 'Clearance'],
            'Tiles' => ['Ceramic Tiles', 'Porcelain Tiles', 'Vinyl Tiles'],
            'Game Court Tiles' => ['COURT INSTALL INSTRUCTIONS', 'COURT INSTRUCTION  HOW IT WORKS', 'COURT KITS ONLY NP', 'Game Court Tiles'],
            'Hospitality Carpet' => [],
            'Kids Rugs' => ['Playroom Rugs', 'Educational Rugs'],
            'LVP' => ['Gluedown LVP', 'Loose Lay Sheet Vinyl', 'LVP', 'Sheet Vinyl'],
            'Marine and Boat Carpet' => ['Caspian', 'COMPETITOR', 'Marina Seaside', 'Mariner', 'Newport', 'Ship N shore Deluxe', 'Ship N Shore Premium', 'Surfside', 'Value Grass', 'Value Grass Quality Super'],
            'Neon Carpet and Rugs' => ['Any Day Matinee', 'Kaleidoscope', 'Neon Carpet and Rugs', 'Neon Lights'],
            'Carpet Tiles' => ['Carpet Tiles', 'Kids Tile'],
        ];

        foreach ($categories as $categoryName => $subcategories) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName, '-')
            ]);

            foreach ($subcategories as $subcatName) {
                Subcategory::create([
                    'name' => $subcatName,
                    'slug' => Str::slug($subcatName, '-'),
                    'category_id' => $category->id,
                    'status' => 1,
                ]);
            }
        }
    }
}
