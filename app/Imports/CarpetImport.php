<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;


class CarpetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $imageUrls = explode(',', $row['image'] ?? '');
        $storedImages = [];

        foreach ($imageUrls as $url) {
            $url = trim($url); // Clean whitespace

            if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
                try {
                    $imageContent = Http::timeout(10)->get($url)->body();
                    $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                    $imageName = Str::random(40) . '.' . $extension;
                    $storagePath = 'uploads/products/' . $imageName;

                    Storage::disk('public')->put($storagePath, $imageContent);
                    $storedImages[] = $storagePath;

                } catch (\Exception $e) {
                    // Log or ignore failed image
                }
            }
        }


        return new Product([

            'name' => $row['name'],
            'slug' => Str::slug($row['name']),
            'category_id' => $row['category_id'],
            'size_id' => $row['size_id'],
            'sku' => $row['sku'],
            'stock' => $row['stock'],
            'tags' => $row['tags'],
            'description' => $row['description'],
            'image' => implode(',', $storedImages),
            'price' => $row['price'],
            'main_content' => $row['main_content'],
            'seo_title' => $row['seo_title'],
            'seo_description' => $row['seo_description'],
            'seo_keywords' => $row['seo_keywords'],
            'seo_schema' => $row['seo_schema'],
            'seo_other_tags' => $row['seo_other_tags'],
            'status' => $row['status'],
            'is_sellable' => $row['is_sellable'],
        ]);
    }
}
