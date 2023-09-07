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
            $table->id(); // single product id
            $table->string('group_id'); // _id
            $table->string('product_image_sm');
            $table->string('product_type');
            $table->string('product_name');
            $table->string('product_departmentId');
            $table->integer('product_stock');
            $table->string('product_color');
            $table->integer('product_price');
            $table->string('product_material');
            $table->integer('product_ratings');
            $table->integer('product_sales');
            $table->string('product_variation_ids');
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
