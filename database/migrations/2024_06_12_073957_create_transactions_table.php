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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactionID');
            $table->foreignUuid('userID')->nullable(false);
            $table->foreignUuid('addressID')->nullable(true);
            $table->foreignUuid('voucherID')->nullable(true);
            $table->foreignUuid('statusID')->nullable(true);
            $table->integer('subTotalPrice')->nullable(true);
            $table->integer('totalWeight')->nullable(true);
            $table->integer('totalDiscount')->nullable(true);
            $table->integer('shippingFee')->nullable(true);
            $table->integer('totalPrice')->nullable(true);
            $table->enum('paymentMethod', ['Kartu Kredit', 'Transfer Bank', 'E-Wallet'])->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('addressID')->references('addressID')->on('addresses');
            $table->foreign('voucherID')->references('voucherID')->on('vouchers');
            $table->foreign('statusID')->references('statusID')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
