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
        // Create Trigger SPP
        DB::unprepared('
            CREATE TRIGGER log_spp BEFORE UPDATE ON `spp` FOR EACH ROW
            BEGIN
                INSERT INTO log_spp SET tahun_lama = OLD.tahun, tahun_baru  = NEW.tahun, nominal_lama = OLD.nominal, nominal_baru = NEW.nominal, nominal_perbulan_lama = OLD.nominal_perbulan, nominal_perbulan_baru = NEW.nominal_perbulan, waktu = NOW();
            END;');

        // Create Trigger Pembayaran
        DB::unprepared('
            CREATE TRIGGER log_pembayaran BEFORE UPDATE ON `pembayaran` FOR EACH ROW
            BEGIN
                INSERT INTO log_pembayaran SET jumlah_bayar_lama = OLD.jumlah_bayar, jumlah_bayar_baru  = NEW.jumlah_bayar, status_lama = OLD.status, status_baru = NEW.status, waktu = NOW();
            END;');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // SPP
        DB::unprepared('DROP TRIGGER IF EXISTS log_spp');
        // Pembayaran
        DB::unprepared('DROP TRIGGER IF EXISTS log_pembayaran');

    }
};
