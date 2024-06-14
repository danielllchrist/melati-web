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
            $table->softDeletes();

            $table->foreign('chatID')->references('chatID')->on('chats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lastSentUserID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
