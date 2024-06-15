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
            $table->id('transactionID');
            $table->uuid('statusID');
            $table->timestamps();
            $table->primary(['transactionID', 'statusID']);
            $table->softDeletes();

            $table->foreign('transactionID')->references('transactionID')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('statusID')->references('statusID')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
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
