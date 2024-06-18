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
        Schema::create('manage_links', function (Blueprint $table) {
            $table->uuid('linkID')->primary();
            $table->foreignUuid('productID')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('productID')->references('productID')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_links');
    }
};
