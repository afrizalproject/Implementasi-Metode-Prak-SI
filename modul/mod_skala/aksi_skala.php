<?php
include('../../config.php');

$module = $_GET['module'];
$act = $_GET['act'];

$value = $_POST['value'];
$keterangan = $_POST['keterangan'];


if ($module=='skala' AND $act=='insert') {
    $conn->query("INSERT INTO skala (value, keterangan) VALUES ($value, '$keterangan')");
    header('location:../../redirect.php?module='.$module);
}
?>