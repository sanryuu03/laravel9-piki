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
        Schema::create('dinamis_url_navbar_keuangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_menu_navbars_id')->nullable();
            $table->integer('sub_menu_navbar_keuangans_id')->nullable();
            $table->string('nama_menu')->nullable();
            $table->string('nama_sub_menu')->nullable();
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
        Schema::dropIfExists('dinamis_url_navbar_keuangans');
    }
};
