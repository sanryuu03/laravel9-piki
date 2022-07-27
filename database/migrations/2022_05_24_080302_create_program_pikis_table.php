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
        Schema::create('program_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('judul_program')->nullable();
            $table->text('slug')->unique();
            $table->text('picture_path_program')->nullable();
            $table->text('keterangan_foto');
            $table->text('isi_program');
            $table->string('post_by')->nullable();
            $table->string('edited_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
        Schema::dropIfExists('program_pikis');
    }
};
