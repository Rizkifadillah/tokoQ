<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->id('id_pembelian_detail');
            $table->bigInteger('id_pembelian');
            $table->bigInteger('id_product');
            $table->integer('harga_beli');
            $table->integer('jumlah');
            $table->integer('subtotal');

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
        Schema::dropIfExists('pembelian_detail');
    }
}
