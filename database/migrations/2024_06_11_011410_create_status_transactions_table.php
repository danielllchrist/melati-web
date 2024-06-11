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
        Schema::create('status_transactions', function (Blueprint $table) {
            $table->uuid('transactionID')->primary();
            $table->uuid('statusID')->primary();
            $table->timestamps();

            $table->foreign('transactionID')->references('transactionID')->on('transactionx');
            $table->foreign('statusID')->references('statusID')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_transactions');
    }
};
