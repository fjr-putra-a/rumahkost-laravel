<?php

namespace App\Model\View;

use Illuminate\Database\Eloquent\Model;

class V_kamar extends Model
{
    protected $table = "view_kamar";
    // select `kamar`.`id` AS `id`,`kamar`.`kode_kamar` AS `kode_kamar`,`kamar`.`id_fasilitas` AS `id_fasilitas`,`kamar`.`tarif` AS `tarif`,`kamar`.`status_kamar` AS `status_kamar`,`kamar`.`created_at` AS `created_at`,`kamar`.`updated_at` AS `updated_at`,`fasilitas`.`nama_fasilitas` AS `nama_fasilitas` from (`kamar` join `fasilitas` on(`kamar`.`id_fasilitas` = `fasilitas`.`id`))
}
