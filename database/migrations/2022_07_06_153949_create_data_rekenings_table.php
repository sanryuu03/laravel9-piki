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
        Schema::create('data_rekenings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('rekening_pembayaran')->default('Bank Sumut');
            $table->text('nomor_rekening')->default('1000.104.000.7722');
            $table->text('atas_nama')->default('DPD PIKI SUMUT');
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
        Schema::dropIfExists('data_rekenings');
    }
};
