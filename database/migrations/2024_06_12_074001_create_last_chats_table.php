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
            // $table->uuid('chatID')->primary()->nullable(false);
            $table->foreignUuid('chatID')->nullable(false);
            $table->foreignUuid('lastUserID')->nullable(false);
            $table->text('lastMessage')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('chatID')->references('chatID')->on('chats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lastUserID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
