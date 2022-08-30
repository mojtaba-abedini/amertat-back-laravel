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
            $table->integer('G150-60-90');
            $table->integer('G150-100-70');
            $table->integer('G170-60-90');
            $table->integer('G170-100-70');
            $table->integer('G200-60-90');
            $table->integer('G2000-100-70');
            $table->integer('G250-60-90');
            $table->integer('G250-100-70');
            $table->integer('G300-60-90');
            $table->integer('G300-100-70');
            $table->integer('C70-60-90');
            $table->integer('C70-100-70');
            $table->integer('C125-60-90');
            $table->integer('C125-100-70');
            $table->integer('C200-60-90');
            $table->integer('C200-100-70');
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
