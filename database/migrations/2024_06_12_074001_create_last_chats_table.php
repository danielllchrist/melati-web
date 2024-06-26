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
            $table->text('lastMessage')->nullable(false);
            $table->foreignUuid('lastSentUserID')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

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
