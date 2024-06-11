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
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('productID')->primary()->nullable(false);
            $table->uuid('transactionID')->primary()->nullable(false);
            $table->integer('rating')->nullable(false);
            $table->text('comment')->nullable(true);
            $table->timestamps();

            $table->foreign('productID')->references('productID')->on('products');
            $table->foreign('transactionID')->references('transactionID')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
