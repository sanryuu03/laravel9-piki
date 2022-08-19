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
        Schema::create('backend_footers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('alamat')->nullable();
            $table->text('telepon')->unique();
            $table->text('email')->nullable();
            $table->text('fb');
            $table->text('yt');
            $table->text('ig');
            $table->text('nama_perusahaan');
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
        Schema::dropIfExists('backend_footers');
    }
};
