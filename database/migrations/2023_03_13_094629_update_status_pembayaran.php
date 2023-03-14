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
    public function up()
    {
        DB::unprepared('
            DROP PROCEDURE IF EXISTS update_status_pembayaran;
            CREATE PROCEDURE update_status_pembayaran (
                IN spp_id INT
            )
            BEGIN
                DECLARE status_baru VARCHAR(10);
                DECLARE nominal_baru INT;

                -- Ambil data SPP baru
                SELECT nominal_perbulan INTO nominal_baru FROM spp WHERE id = spp_id;

                -- Update status pembayaran siswa
                UPDATE pembayaran SET
                    status = CASE
                                WHEN jumlah_bayar >= nominal_baru THEN "lunas"
                                WHEN jumlah_bayar <= nominal_baru THEN "belum lunas"
                                ELSE "belum lunas"
                             END
                WHERE spp_id = spp_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS update_status_pembayaran;');
    }
};
