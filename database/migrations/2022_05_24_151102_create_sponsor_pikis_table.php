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
        Schema::create('sponsor_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('picture_path');
            $table->text('konten');
            $table->text('penulis');
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
        Schema::dropIfExists('sponsor_pikis');
    }
};
