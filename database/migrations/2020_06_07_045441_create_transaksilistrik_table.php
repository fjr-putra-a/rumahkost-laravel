<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksilistrikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksilistrik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('periode');
            $table->string('id_penyewa');
            $table->string('id_token');
            $table->double('jumlah_biaya');
            $table->enum('status_bayar', ['Lunas', 'Belum Lunas']);
            $table->string('arsip');
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
        Schema::dropIfExists('transaksilistrik');
    }
}
