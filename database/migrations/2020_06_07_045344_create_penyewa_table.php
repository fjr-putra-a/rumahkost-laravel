<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nomor_ktp');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('pekerjaan');
            $table->char('no_hp', 15);
            $table->string('id_kamar');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('foto')->default('a-penyewa.png');
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
        Schema::dropIfExists('penyewa');
    }
}
