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
        Schema::create('voucher_usages', function (Blueprint $table) {
            $table->foreignUuid('voucherID');
            $table->foreignUuid('userID');
            $table->timestamps();
            $table->primary(['voucherID', 'userID']);
            $table->softDeletes();

            $table->foreign('voucherID')->references('voucherID')->on('vouchers');
            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_usages');
    }
};
