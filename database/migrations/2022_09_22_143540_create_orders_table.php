<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('order_number');
            $table->foreignId('status_id');
            $table->foreign('status_id')->references('id')->on('status_orders')->onDelete('cascade');
            $table->foreignId('taraf_hesab_id');
            $table->foreign('taraf_hesab_id')->references('id')->on('taraf_hesabs')->onDelete('cascade');
            $table->foreignId('jens_id');
            $table->foreign('jens_id')->references('id')->on('jens')->onDelete('cascade');
            $table->foreignId('karbari_id');
            $table->foreign('karbari_id')->references('id')->on('karbaris')->onDelete('cascade');
            $table->foreignId('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->integer('tedad');
            $table->String('size_ekhtesasi')->nullable();
            $table->foreignId('paper_sizes_id')->nullable();
            $table->foreign('paper_sizes_id')->references('id')->on('paper_sizes')->onDelete('cascade');
            $table->integer('printing_color');
            $table->integer('selefon_id');
            $table->integer('talakoob_id');
            $table->integer('uv_id');
            $table->integer('letter_press_id');
            $table->integer('sahafi_id');
            $table->integer('total_price');
            $table->integer('peyaneh_price');
            $table->date('order_date');
            $table->integer('bank_id');

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
        Schema::dropIfExists('orders');
    }
}
