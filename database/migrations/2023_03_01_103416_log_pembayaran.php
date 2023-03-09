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
        Schema::create('log_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_bayar_lama');
            $table->string('jumlah_bayar_baru');
            $table->string('status_lama');
            $table->string('status_baru');
            $table->date('waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
