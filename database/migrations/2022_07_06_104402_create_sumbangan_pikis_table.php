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
            $table->string('telp')->nullable();
            $table->text('tujuan_sumbangan')->nullable();
            $table->string('email')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->text('alamat')->nullable();
            $table->text('berita')->nullable();
            $table->string('rekening_pembayaran')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('atas_nama')->nullable();
            $table->text('picture_path_slip_setoran_sumbangan')->nullable();
            $table->string('status_sumbangan')->default('sumbangan baru');
            $table->string('status_verifikasi_bendahara')->nullable();
            $table->string('status_verifikasi_ketua')->nullable();
            $table->string('status_verifikasi_spi')->nullable();
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
