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
            $table->foreignUuid('addressID')->nullable(false);
            $table->foreignUuid('voucherID')->nullable(true);
            $table->foreignUuid('statusID')->nullable(false);
            $table->integer('subTotalPrice')->nullable(false);
            $table->integer('totalWeight')->nullable(false);
            $table->integer('totalDiscount')->nullable(true);
            $table->integer('shippingFee')->nullable(false);
            $table->integer('totalPrice')->nullable(false);
            $table->enum('paymentMethod', ['Kartu Kredit', 'Transfer Bank', 'E-Wallet'])->nullable(false);
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
