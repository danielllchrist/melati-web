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
        Schema::create('sizes', function (Blueprint $table) {
            $table->uuid('sizeID')->primary();
            $table->uuid('productID')->nullable(false);
            $table->enum('size', ['S', 'M', 'L', 'XL'])->nullable(true);
            $table->integer('Stock')->nullable(false);
            $table->timestamps();

            $table->foreign('productID')->references('productID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
