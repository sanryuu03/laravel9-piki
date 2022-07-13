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
            $table->string('jenis_setoran')->nullable();
            $table->text('iuran_bulan')->nullable();
            $table->text('jumlah_iuran')->nullable();
            $table->text('jumlah_sumbangan')->nullable();
            $table->text('nama_penyumbang')->nullable();
            $table->string('telp')->nullable();
            $table->text('tujuan_sumbangan')->nullable();
            $table->text('berita')->nullable();
            $table->string('rekening_pembayaran')->default('Bank Sumut');
            $table->string('nomor_rekening')->default('1000.104.000.7722');
            $table->string('atas_nama')->default('DPD PIKI SUMUT');
            $table->text('picture_path_slip_setoran_iuran')->nullable();
            $table->string('status_iuran')->default('iuran baru');
            $table->string('status_verifikasi_bendahara')->nullable();
            $table->string('status_verifikasi_ketua')->nullable();
            $table->string('status_verifikasi_spi')->nullable();
            $table->text('alasan_ditolak')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
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
