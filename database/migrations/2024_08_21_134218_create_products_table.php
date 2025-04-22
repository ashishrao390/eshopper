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
            $table->string('product_name');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                    ->references('id')
                    ->on('brands')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('weartype_id');
            $table->foreign('weartype_id')
                    ->references('id')
                    ->on('weartypes')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                    ->references('id')
                    ->on('genders')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')
                    ->references('id')
                    ->on('colors')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')
                    ->references('id')
                    ->on('sizes')
                    ->onDelete('cascade');
            $table->decimal('price');
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')
                    ->references('id')
                    ->on('discounts')
                    ->onDelete('cascade');
            $table->string('description');
            $table->string('image_url');
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
