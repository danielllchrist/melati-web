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
        Schema::create('return_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('transactionID')->nullable(false);
            $table->text('comment')->nullable(false);
            $table->primary('transactionID');
            $table->timestamps();

            $table->foreign('transactionID')->references('transactionID')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_orders');
    }
};
