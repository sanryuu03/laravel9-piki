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
        Schema::create('sumbangan_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jumlah_sumbangan')->nullable();
            $table->text('nama_penyumbang')->nullable();
            $table->text('telp')->nullable();
            $table->text('tujuan_sumbangan')->nullable();
            $table->text('email')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('desa')->nullable();
            $table->text('alamat')->nullable();
            $table->text('berita')->nullable();
            $table->text('rekening_pembayaran')->nullable();
            $table->text('nomor_rekening')->nullable();
            $table->text('atas_nama')->nullable();
            $table->text('picture_path_slip_setoran_sumbangan')->nullable();
            $table->text('status_sumbangan')->default('sumbangan baru');
            $table->text('status_verifikasi_bendahara')->nullable();
            $table->text('status_verifikasi_ketua')->nullable();
            $table->text('status_verifikasi_spi')->nullable();
            $table->text('alasan_ditolak')->nullable();
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
        Schema::dropIfExists('sumbangan_pikis');
    }
};
