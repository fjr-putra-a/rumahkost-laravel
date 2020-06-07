<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksikamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksikamar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('periode');
            $table->string('id_penyewa');
            $table->string('kode_kamar');
            $table->double('tarif');
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
        Schema::dropIfExists('transaksikamar');
    }
}
