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
        Schema::create('room_chats', function (Blueprint $table) {
            $table->uuid('roomChatID')->primary()->nullable(false);
            $table->uuid('userID')->nullable(false);
            $table->uuid('adminID')->nullable(false);
            $table->uuid('lastChatID')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('adminID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lastChatID')->references('lastChatID')->on('last_chats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_chats');
    }
};
