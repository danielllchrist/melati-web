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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('transactionID');
            $table->foreignUuid('sizeID')->nullable(false);
            $table->foreignUuid('productID')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->integer('weight')->nullable(false);
            $table->timestamps();
            $table->primary(['sizeID', 'transactionID']);
            $table->softDeletes();

            $table->foreign('transactionID')->references('transactionID')->on('transactions');
            $table->foreign('productID')->references('productID')->on('products');
            $table->foreign('sizeID')->references('sizeID')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
