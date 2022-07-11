<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jenis_setoran')->nullable();
            $table->text('iuran_bulan')->nullable();
            $table->text('jumlah_iuran')->nullable();
            $table->text('jumlah_sumbangan')->nullable();
            $table->text('nama_penyumbang')->nullable();
            $table->text('telp')->nullable();
            $table->text('tujuan_sumbangan')->nullable();
            $table->text('berita')->nullable();
            $table->text('rekening_pembayaran')->default('Bank Sumut');
            $table->text('nomor_rekening')->default('1000.104.000.7722');
            $table->text('atas_nama')->default('DPD PIKI SUMUT');
            $table->text('picture_path_slip_setoran_iuran')->nullable();
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
        Schema::dropIfExists('iuran_pikis');
    }
};
