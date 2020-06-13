<?php

namespace App\Model\View;

use Illuminate\Database\Eloquent\Model;

class V_Penyewa extends Model
{
    protected $table = "view_penyewa";
    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];
    // select `kamar`.`kode_kamar` AS `kode_kamar`,`fasilitas`.`nama_fasilitas` AS `nama_fasilitas`,`kamar`.`tarif` AS `tarif`,`penyewa`.`id` AS `id`,`penyewa`.`nama` AS `nama`,`penyewa`.`email` AS `email`,`penyewa`.`nomor_ktp` AS `nomor_ktp`,`penyewa`.`jk` AS `jk`,`penyewa`.`pekerjaan` AS `pekerjaan`,`penyewa`.`no_hp` AS `no_hp`,`penyewa`.`id_kamar` AS `id_kamar`,`penyewa`.`tanggal_masuk` AS `tanggal_masuk`,`penyewa`.`tanggal_keluar` AS `tanggal_keluar`,`penyewa`.`foto` AS `foto`,`penyewa`.`created_at` AS `created_at`,`penyewa`.`updated_at` AS `updated_at` from ((`penyewa` join `kamar` on(`penyewa`.`id_kamar` = `kamar`.`id`)) join `fasilitas` on(`kamar`.`id_fasilitas` = `fasilitas`.`id`))
}
