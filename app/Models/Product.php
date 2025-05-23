<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Size;

class Product extends Model
{
    protected $casts = [
        'size_id' => 'array',
    ];

    // add fillable
    protected $fillable = [];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class, 'id', 'size_id');
    }
    public function getSizeTitlesAttribute(): array
    {
        $ids = $this->size_id ?? [];

        if (!is_array($ids)) {
            $ids = json_decode($ids, true);
        }

        return Size::whereIn('id', $ids)->pluck('title')->toArray();
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
