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
        Schema::create('sponsorship_before_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iklan_1')->nullable();
            $table->string('link_web_1')->nullable();
            $table->string('iklan_2')->nullable();
            $table->string('link_web_2')->nullable();
            $table->string('iklan_3')->nullable();
            $table->string('link_web_3')->nullable();
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
        Schema::dropIfExists('sponsorship_before_faqs');
    }
};
