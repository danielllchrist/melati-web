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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('addressID')->primary();
            $table->uuid('userID')->nullable(false);
            $table->string('province', 255)->nullable(false);
            $table->string('cityOrRegency', 255)->nullable(false);
            $table->string('nameAddress', 255)->nullable(false);
            $table->text('detailAddress')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
