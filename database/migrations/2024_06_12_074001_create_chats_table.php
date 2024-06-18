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
        Schema::create('chats', function (Blueprint $table) {
            $table->foreignUuid('chatID')->primary()->nullable(false);
            $table->foreignUuid('userID')->nullable(false);
            $table->text('message')->nullable(false);
            $table->boolean('isImage')->default(false)->nullable(false);
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
        Schema::dropIfExists('chats');
    }
};
