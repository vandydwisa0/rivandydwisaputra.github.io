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
        // Create Trigger SPP nominal_perbulan
        DB::unprepared('
            CREATE TRIGGER log_spp BEFORE UPDATE ON `spp` FOR EACH ROW
            BEGIN
                INSERT INTO log_spp SET tahun_lama = OLD.tahun, tahun_baru  = NEW.tahun, nominal_lama = OLD.nominal, nominal_baru = NEW.nominal, waktu = NOW();
            END;');

        // Create Trigger Pembayaran
        DB::unprepared('
            CREATE TRIGGER log_pembayaran BEFORE UPDATE ON `pembayaran` FOR EACH ROW
            BEGIN
                INSERT INTO log_pembayaran SET jumlah_bayar_lama = OLD.jumlah_bayar, jumlah_bayar_baru  = NEW.jumlah_bayar, status_lama = OLD.status, status_baru = NEW.status, waktu = NOW();
            END;');



        // // Create trigger on create
        // DB::unprepared('
        //     CREATE TRIGGER trg_spp_create
        //     AFTER INSERT ON spp
        //     FOR EACH ROW
        //     BEGIN
        //         INSERT INTO log_spp (tahun, nominal, action, created_at)
        //         VALUES (NEW.tahun, NEW.nominal, "insert", NOW());
        //     END
        // ');

        // // Create trigger on update
        // DB::unprepared('
        //     CREATE TRIGGER trg_spp_update
        //     AFTER UPDATE ON spp
        //     FOR EACH ROW
        //     BEGIN
        //         INSERT INTO log_spp (tahun, nominal, action, updated_at)
        //         VALUES (NEW.tahun, NEW.nominal, "update", NOW());
        //     END
        // ');

        // // Create trigger on delete
        // DB::unprepared('
        //     CREATE TRIGGER trg_spp_delete
        //     AFTER DELETE ON spp
        //     FOR EACH ROW
        //     BEGIN
        //         INSERT INTO log_spp (tahun, nominal, action, deleted_at)
        //         VALUES (OLD.tahun, OLD.nominal, "delete", NOW());
        //     END
        // ');
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
