<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarbarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karbaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jens_id');
            $table->foreign('jens_id')->references('id')->on('jens')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('karbaris');
    }
}
