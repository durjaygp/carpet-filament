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
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->string('header_second_line_title')->nullable();
            $table->string('header_small_paragraph')->nullable();
            $table->string('header_phone_number')->nullable();
            $table->string('header_button')->nullable();
            $table->text('header_button_url')->nullable();
            $table->string('header_image')->nullable();

            // About Section
            $table->string('about_title')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('about_button')->nullable();
            $table->text('about_button_url')->nullable();
            $table->string('about_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
