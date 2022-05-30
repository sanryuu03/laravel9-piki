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
        Schema::create('news_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('picture_path')->nullable();
            $table->text('judul_berita');
            $table->text('keterangan_foto');
            $table->text('isi_berita');
            $table->text('link_berita')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_pikis');
    }
};
