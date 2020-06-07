<?php

namespace App\Model\View;

use Illuminate\Database\Eloquent\Model;

class V_TransaksiListrik extends Model
{
    protected $table = "view_transaksilistrik";
    protected $dates = ['tanggal_transaksi'];
    // select `transaksilistrik`.`id` AS `id`,`transaksilistrik`.`nomor_transaksi` AS `nomor_transaksi`,`transaksilistrik`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksilistrik`.`periode` AS `periode`,`transaksilistrik`.`id_penyewa` AS `id_penyewa`,`transaksilistrik`.`id_token` AS `id_token`,`transaksilistrik`.`jumlah_biaya` AS `jumlah_biaya`,`transaksilistrik`.`status_bayar` AS `status_bayar`,`transaksilistrik`.`arsip` AS `arsip`,`transaksilistrik`.`created_at` AS `created_at`,`transaksilistrik`.`updated_at` AS `updated_at`,`penyewa`.`nama` AS `nama`,`token`.`token_listrik` AS `token_listrik` from ((`transaksilistrik` join `penyewa` on(`penyewa`.`id` = `transaksilistrik`.`id_penyewa`)) join `token` on(`token`.`id` = `transaksilistrik`.`id_token`))
}
