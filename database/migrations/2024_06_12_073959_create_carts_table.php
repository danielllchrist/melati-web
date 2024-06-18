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
        Schema::create('carts', function (Blueprint $table) {
            $table->foreignUuid('userID');
            $table->foreignUuid('productID');
            $table->integer('quantity')->nullable(false);
            $table->timestamps();
            $table->primary(['userID', 'productID']);
            $table->softDeletes();

            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productID')->references('productID')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
