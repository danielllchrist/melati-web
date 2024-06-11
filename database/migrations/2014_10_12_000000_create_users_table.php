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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('userID')->primary();
            $table->string('name',255)->nullable(false);
            $table->enum('gender', ['Pria', 'Wanita'])->nullable(false);
            $table->string('email',255)->nullable(false)->unique();
            $table->string('phoneNum',20)->nullable(false)->unique();
            $table->integer('age')->nullable(false);
            $table->string('password', 100)->nullable(false);
            $table->string('profilePicturePath')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
