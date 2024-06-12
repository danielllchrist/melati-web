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
        Schema::create('last_chats', function (Blueprint $table) {
            $table->uuid('lastChatID')->primary()->nullable(false);
            $table->uuid('chatID')->nullable(false);
            $table->uuid('lastMessage')->nullable(false);
            $table->uuid('lastSentUserID')->nullable(false);
            $table->timestamps();

            $table->foreign('chatID')->references('chatID')->on('chats');
            $table->foreign('lastSentUserID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_chats');
    }
};
