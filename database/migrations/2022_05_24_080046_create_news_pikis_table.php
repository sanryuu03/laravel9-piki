<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
            $table->foreignId('category_news_id');
            $table->text('judul_berita')->nullable();
            $table->text('slug')->unique();
            $table->text('picture_path')->nullable();
            $table->text('keterangan_foto');
            $table->text('excerpt');
            $table->text('isi_berita');
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
