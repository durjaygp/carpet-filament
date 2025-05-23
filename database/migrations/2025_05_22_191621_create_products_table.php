<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();

            // Foreign keys
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('size_id')->nullable();

            // Product details
            $table->string('sku')->unique()->nullable(); // Stock Keeping Unit
            $table->integer('stock')->default(0);
            $table->string('tags', 255)->nullable(); // safer for indexing



            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->longText('main_content')->nullable();

            // SEO Fields
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_schema')->nullable();
            $table->longText('seo_other_tags')->nullable();

            $table->boolean('status')->default(1);
            $table->boolean('is_sellable')->default(1);

            $table->timestamps();

            // Indexes for search performance
            $table->index(['name', 'slug']);
            $table->index('sku');
            $table->index('tags');
            $table->index('category_id');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
