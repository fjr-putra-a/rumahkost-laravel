<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransaksiKamar extends Model
{
    protected $table = 'transaksi_kamar';
    protected $dates = ['tanggal_transaksi'];
    protected $guarded = [];
}
