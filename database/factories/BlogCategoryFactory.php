<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BlogCategory::class;

    public function definition(): array
    {
        // 10 Carpet-related blog categories
        static $categories = [
            'Modern Rugs',
            'Persian Carpets',
            'Kids Rugs',
            'Outdoor Rugs',
            'Shaggy Rugs',
            'Vintage Carpets',
            'Wool Rugs',
            'Area Rugs',
            'Luxury Carpets',
            'Eco-Friendly Rugs',
        ];

        static $index = 0;

        $name = $categories[$index++ % count($categories)];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'status' => 1,
        ];
    }

}
