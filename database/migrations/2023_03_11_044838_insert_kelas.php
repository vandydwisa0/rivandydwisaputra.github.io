<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS insert_kelas;
    CREATE PROCEDURE insert_kelas (IN nama_kelas VARCHAR(255), IN kompetensi_keahlian VARCHAR(255), IN singkatan VARCHAR(255), IN created DATETIME)
    BEGIN
        INSERT INTO kelas (nama_kelas, kompetensi_keahlian, singkatan, created)
        VALUES (nama_kelas, kompetensi_keahlian, singkatan, now());
    END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
