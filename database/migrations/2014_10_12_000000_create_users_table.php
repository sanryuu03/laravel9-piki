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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('name');
            $table->string('birthplace');
            $table->date('date')->nullable();
            $table->text('gender')->nullable();
            $table->text('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('nik')->unique()->nullable();
            $table->text('address')->nullable();
            $table->text('province')->nullable();
            $table->text('city')->nullable();
            $table->text('district')->nullable();
            $table->text('village')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('sekolah')->nullable();
            $table->text('university')->nullable();
            $table->text('fakultas')->nullable();
            $table->text('jurusan')->nullable();
            $table->text('job')->nullable();
            $table->string('photo_ktp')->nullable();
            $table->string('photo_profile')->nullable();
            $table->text('church')->nullable();
            $table->text('business_fields')->nullable();
            $table->text('description_of_skills')->nullable();
            $table->text('status_anggota')->default('belum di proses');
            $table->text('alasan_ditolak')->nullable();
            $table->enum('level', ['super-admin', 'admin', 'bendahara', 'wakil-ketua', 'organisasi', 'infokom', 'media', 'anggota'])->default('anggota');
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
};
