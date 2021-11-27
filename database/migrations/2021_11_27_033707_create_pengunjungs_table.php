<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpengunjung', function (Blueprint $table) {
            $table->id();
            $table->string("kodepos",11);
            $table->foreign("kodepos")->references("kodepos")->on("tblwisata");
            $table->unsignedBigInteger("lokasi_id");
            $table->foreign("lokasi_id")->references("id")->on("tbllokasi");
            $table->smallInteger("pengunjung");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpengunjung');
    }
}
