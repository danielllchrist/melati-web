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
        Schema::create('statuses', function (Blueprint $table) {
            $table->uuid('statusID')->primary();
            $table->enum('statusName', [
                'Menunggu Konfirmasi',
                'Telah Diproses',
                'Dalam Pengiriman',
                'Telah Tiba',
                'Penilaian'
            ]);
            $table->enum('pic', [
                'Admin',
                'Jasa Kirim'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
