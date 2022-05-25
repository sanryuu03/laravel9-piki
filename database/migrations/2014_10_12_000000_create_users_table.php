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
            $table->string('name');
            $table->text('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('nik')->nullable();
            $table->text('address')->nullable();
            $table->text('province')->nullable();
            $table->text('city')->nullable();
            $table->text('districts')->nullable();
            $table->text('village')->nullable();
            $table->text('job')->nullable();
            $table->text('photo_ktp')->nullable();
            $table->text('photo_profile')->nullable();
            $table->text('business_fields')->nullable();
            $table->text('description_of_skills')->nullable();
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
