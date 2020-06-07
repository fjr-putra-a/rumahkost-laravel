<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewa';
    protected $dates = ['tanggal_masuk', 'tanggal_keluar'];
    protected $guarded = [];
}
