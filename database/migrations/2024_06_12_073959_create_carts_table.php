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
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('userID')->primary();
            $table->uuid('productID')->primary();
            $table->integer('quantity')->nullable(false);
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('productID')->references('productID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
