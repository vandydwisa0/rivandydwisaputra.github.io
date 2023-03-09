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
        // Create trigger on create
        DB::unprepared('
            CREATE TRIGGER trg_spp_create
            AFTER INSERT ON spp
            FOR EACH ROW
            BEGIN
                INSERT INTO log_spp (tahun, nominal, action, created_at)
                VALUES (NEW.tahun, NEW.nominal, "insert", NOW());
            END
        ');

        // Create trigger on update
        DB::unprepared('
            CREATE TRIGGER trg_spp_update
            AFTER UPDATE ON spp
            FOR EACH ROW
            BEGIN
                INSERT INTO log_spp (tahun, nominal, action, updated_at)
                VALUES (NEW.tahun, NEW.nominal, "update", NOW());
            END
        ');

        // Create trigger on delete
        DB::unprepared('
            CREATE TRIGGER trg_spp_delete
            AFTER DELETE ON spp
            FOR EACH ROW
            BEGIN
                INSERT INTO log_spp (tahun, nominal, action, deleted_at)
                VALUES (OLD.tahun, OLD.nominal, "delete", NOW());
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
        // Drop the triggers
        DB::unprepared('DROP TRIGGER IF EXISTS trg_spp_create');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_spp_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_spp_delete');
    }
};
