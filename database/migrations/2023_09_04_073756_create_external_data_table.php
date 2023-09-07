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
        Schema::create('external_data', function (Blueprint $table) {
            $table->id();
            $table->string('product_id'); // _id
            $table->string('product_image_sm');
            $table->string('product_image_md');
            $table->string('product_image_lg');
            $table->string('product_type');
            $table->string('product_name');
            $table->string('product_department');
            $table->string('product_departmentId');
            $table->integer('product_stock');
            $table->string('product_color');
            $table->integer('product_price');
            $table->string('product_material');
            $table->integer('product_ratings');
            $table->integer('product_sales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_data');
    }
};
