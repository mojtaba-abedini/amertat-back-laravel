<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jens_id');
            $table->foreign('jens_id')->references('id')->on('jens')->onDelete('cascade');
            $table->foreignId('karbari_id');
            $table->foreign('karbari_id')->references('id')->on('karbaris')->onDelete('cascade');
            $table->foreignId('paper_size_id');
            $table->foreign('paper_size_id')->references('id')->on('paper_sizes')->onDelete('cascade');
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
        Schema::dropIfExists('sizes');
    }
}
