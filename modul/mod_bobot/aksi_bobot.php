<?php
include('../../config.php');

$module = $_GET['module'];
$act = $_GET['act'];

$id_kriteria = $_POST['idkriteria'];
$value = $_POST['value'];

if ($module=='bobot' AND $act=='insert') {
    $conn->query("INSERT INTO bobot (idkriteria, value) VALUES ($id_kriteria, '$value')");
    header('location:../../redirect.php?module='.$module);
}
?>