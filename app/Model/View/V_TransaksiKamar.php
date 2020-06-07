<?php

namespace App\Model\View;

use Illuminate\Database\Eloquent\Model;

class V_TransaksiKamar extends Model
{
    protected $table = "view_transaksikamar";
    protected $dates = ['tanggal_transaksi'];
    // select `transaksikamar`.`id` AS `id`,`transaksikamar`.`nomor_transaksi` AS `nomor_transaksi`,`transaksikamar`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksikamar`.`periode` AS `periode`,`transaksikamar`.`id_penyewa` AS `id_penyewa`,`transaksikamar`.`kode_kamar` AS `kode_kamar`,`transaksikamar`.`tarif` AS `tarif`,`transaksikamar`.`status_bayar` AS `status_bayar`,`transaksikamar`.`arsip` AS `arsip`,`transaksikamar`.`created_at` AS `created_at`,`transaksikamar`.`updated_at` AS `updated_at`,`penyewa`.`nama` AS `nama` from (`transaksikamar` join `penyewa` on(`penyewa`.`id` = `transaksikamar`.`id_penyewa`))
}
