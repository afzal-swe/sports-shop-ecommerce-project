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
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->constrained('subcategories')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('discount_price')->nullable();
            $table->string('post_date')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
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
