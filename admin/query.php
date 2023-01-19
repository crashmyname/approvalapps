<?php
include('../inc/koneksi.php');

$tingkatrusak = $db->prepare("SELECT * FROM tb_kategorikerusakan");
$tingkatrusak->execute();
$alat = $db->prepare("SELECT * FROM tb_alat");
$alat->execute();
$kendaraan = $db->prepare("SELECT * FROM tb_kendaraan");
$kendaraan->execute();
$perbaikan = $db->prepare("SELECT * FROM tb_perbaikan");
$perbaikan->execute();

?>