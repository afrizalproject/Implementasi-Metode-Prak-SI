<?php
include('../../config.php');

$module = $_GET['module'];
$act = $_GET['act'];

$id_alternatif = $_POST['id_alternatif'];
$id_bobot = $_POST['id_bobot'];
$id_skala = $_POST['id_skala'];

if ($module=='matrix' AND $act=='insert') {
    $conn->query("INSERT INTO matrixkeputusan (idalternatif, idbobot, idskala) VALUES ($id_alternatif, $id_bobot, $id_skala)");
    header('location:../../redirect.php?module='.$module);
}
?>