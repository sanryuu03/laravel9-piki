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
        Schema::create('data_bank_iurans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rekening_pembayaran')->default('Bank Sumut');
            $table->string('nomor_rekening')->default('1000.104.000.7722');
            $table->string('atas_nama')->default('DPD PIKI SUMUT');
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
        Schema::dropIfExists('data_bank_iurans');
    }
};
