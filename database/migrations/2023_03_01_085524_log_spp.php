<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('log_spp', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('nominal', 20);
            $table->string('action'); // insert, update, delete
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('spp_id')->references('id')->on('spp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_spp');
    }
};
