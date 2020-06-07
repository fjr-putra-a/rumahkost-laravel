<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransaksiListrik extends Model
{
    protected $table = 'transaksi_listrik';
    protected $dates = ['tanggal_transaksi'];
    protected $guarded = [];
}
