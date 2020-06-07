<?php

namespace App\Model\View;

use Illuminate\Database\Eloquent\Model;

class V_Penyewa extends Model
{
    protected $table = "view_penyewa";
    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];
    // select `penyewa`.`id` AS `id`,`penyewa`.`nomor_ktp` AS `nomor_ktp`,`penyewa`.`nama` AS `nama`,`penyewa`.`jk` AS `jk`,`penyewa`.`pekerjaan` AS `pekerjaan`,`penyewa`.`no_hp` AS `no_hp`,`penyewa`.`kode_kamar` AS `kode_kamar`,`penyewa`.`tanggal_masuk` AS `tanggal_masuk`,`penyewa`.`tanggal_keluar` AS `tanggal_keluar`,`penyewa`.`created_at` AS `created_at`,`penyewa`.`updated_at` AS `updated_at`,`view_kamar`.`tarif` AS `tarif`,`view_kamar`.`nama_fasilitas` AS `nama_fasilitas` from (`penyewa` join `view_kamar` on(`view_kamar`.`kode_kamar` = `penyewa`.`kode_kamar`))
}
