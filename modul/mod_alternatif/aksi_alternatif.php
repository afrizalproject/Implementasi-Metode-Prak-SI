<?php
include('../../config.php');

$module = $_GET['module'];
$act = $_GET['act'];

$nama = $_POST['nama'];

if ($module=='alternatif' AND $act=='insert') {
    $conn->query("INSERT INTO alternatif (namaalternatif) VALUES ('$nama')");
    header('location:../../redirect.php?module='.$module);
}
?>