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
            $table->foreignUuid('userID')->nullable(false);
            $table->string('nameAddress', 255)->nullable(false);
            $table->string('receiver', 255)->nullable(false);
            $table->string('phoneNum', 20)->nullable(false);
            $table->string('detailAddress', 255)->nullable(false);
            $table->string('ward', 255)->nullable(false);
            $table->string('cityOrRegency', 255)->nullable(false);
            $table->string('province', 255)->nullable(false);
            $table->text('description')->nullable(true);
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
