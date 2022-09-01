<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('jens_id');
            $table->foreign('jens_id')->references('id')->on('jens')->onDelete('cascade');
            $table->foreignId('gram_id');
            $table->foreign('gram_id')->references('id')->on('grams')->onDelete('cascade');
            $table->foreignId('shit_size_id');
            $table->foreign('shit_size_id')->references('id')->on('shit_sizes')->onDelete('cascade');
            $table->integer('price');
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
        Schema::dropIfExists('paper_prices');
    }
}
