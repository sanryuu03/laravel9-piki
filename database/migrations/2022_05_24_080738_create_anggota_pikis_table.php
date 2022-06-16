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
        Schema::create('anggota_pikis', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('users_id');
            $table->string('name')->nullable();
            $table->text('province')->nullable();
            $table->text('city')->nullable();
            $table->text('district')->nullable();
            $table->text('village')->nullable();
            $table->text('job')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_number')->nullable();
            $table->enum('status_anggota', ['diterima', 'dalam proses', 'tidak sesuai', 'belum di proses'])->default('belum di proses');
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
        Schema::dropIfExists('anggota_pikis');
    }
};
