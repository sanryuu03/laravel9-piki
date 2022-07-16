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
        Schema::create('pengeluaran_rutins', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pos_anggaran')->nullable();
            $table->text('nama_kegiatan')->nullable();
            $table->string('tanggal')->nullable();
            $table->text('uraian_pengeluaran')->nullable();
            $table->string('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('jumlah')->nullable();
            $table->text('berita')->nullable();
            $table->text('picture_path_bukti_pengeluaran_rutin')->nullable();
            $table->string('status_pengeluaran')->default('pengeluaran baru');
            $table->string('status_verifikasi_bendahara')->nullable();
            $table->string('status_verifikasi_ketua')->nullable();
            $table->string('status_verifikasi_spi')->nullable();
            $table->text('alasan_ditolak')->nullable();
            $table->string('post_by')->nullable();
            $table->string('edited_by')->nullable();
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
        Schema::dropIfExists('pengeluaran_rutins');
    }
};
