$(document).ready(function () {

    // Khusus Periode //
    // Transaksi Token
    $('.datatoken').load('data_transaksi_token.php');
    $('.bulan').change(function () {
        var data = $(this).val();
        $('.datatoken').load('data_transaksi_token.php?datatoken=' + data);
    });
    // Transaksi Kamar
    $('.datakamar').load('data_transaksi_kamar.php');
    $('.bulan').change(function () {
        var data = $(this).val();
        $('.datakamar').load('data_transaksi_kamar.php?datakamar=' + data);
    });
    // Arsip Kamar
    $('.arsipkamar').load('d_transaksi_kamar.php');
    $('.bulan').change(function () {
        var data = $(this).val();
        $('.arsipkamar').load('d_transaksi_kamar.php?arsipkamar=' + data);
    });
    // Arsip Kamar
    $('.arsiptoken').load('d_transaksi_token.php');
    $('.bulan').change(function () {
        var data = $(this).val();
        $('.arsiptoken').load('d_transaksi_token.php?arsiptoken=' + data);
    });
    // Laporan Kamar Lunas
    $('.kamarlunas').load('dl_kamar_lunas.php');
    $('.bulan0').change(function () {
        var data = $(this).val();
        $('.kamarlunas').load('dl_kamar_lunas.php?kamarlunas=' + data);
    });
    // Laporan Kamar Belum Lunas
    $('.kamarbelum').load('dl_kamar_b.lunas.php');
    $('.bulan0').change(function () {
        var data = $(this).val();
        $('.kamarbelum').load('dl_kamar_b.lunas.php?kamarbelum=' + data);
    });
    // Laporan Token Lunas
    $('.tokenlunas').load('dl_token_lunas.php');
    $('.bulan0').change(function () {
        var data = $(this).val();
        $('.tokenlunas').load('dl_token_lunas.php?tokenlunas=' + data);
    });
    // Laporan Token Belum Lunas
    $('.tokenbelum').load('dl_token_b.lunas.php');
    $('.bulan0').change(function () {
        var data = $(this).val();
        $('.tokenbelum').load('dl_token_b.lunas.php?tokenbelum=' + data);
    });

    // KHUSUS GET //
    // Transaksi Listrik
    $("#idbiaya").change(function () {
        var idbiaya = $("#idbiaya").val();
        $("#token").load("../../views/get/getlistrik.php?idbiaya=" + idbiaya);
    });
    // Transaksi Kamar
    $("#idpenyewa0").change(function () {
        var idpenyewa = $("#idpenyewa0").val();
        $("#kamar").load("../../views/get/getkodekamar.php?idpenyewa=" + idpenyewa);
    });
    // Tarif Transaksi Kamar
    $("#idpenyewa0").change(function () {
        var tarif = $("#idpenyewa0").val();
        $("#tarif").load("../../views/get/gettarif.php?idpenyewa=" + tarif);
    });

});
