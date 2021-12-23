<?php
include('../../config.php');

$module = $_GET['module'];
$act = $_GET['act'];

$nama = $_POST['nama'];
$atribut = $_POST['atribut'];

if ($module=='kriteria' AND $act=='insert') {
    $conn->query("INSERT INTO kriteria (namakriteria) VALUES ('$nama')");
    header('location:../../redirect.php?module='.$module);
}
?>