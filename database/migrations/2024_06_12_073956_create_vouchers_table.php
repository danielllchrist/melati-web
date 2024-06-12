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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->uuid('voucherID')->primary();
            $table->string('voucherName', 255)->nullable(false);
            $table->integer('voucherNominal')->nullable(false);
            $table->date('startDate')->nullable(false);
            $table->date('expiredDate')->nullable(false);
            $table->integer('minimumSpending')->nullable(false);
            $table->integer('voucherQuantity')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
