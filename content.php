<?php
    include "config.php";

    if ($_GET['module']=='home') {
        include "dashboard.php";
    }elseif ($_GET['module']=='alternatif') {
        include "modul/mod_alternatif/alternatif.php";
    }elseif ($_GET['module']=='kriteria'){
        include "modul/mod_kriteria/kriteria.php";
    }elseif ($_GET['module']=='bobot'){
        include "modul/mod_bobot/bobot.php";
    }elseif ($_GET['module']=='skala'){
        include "modul/mod_skala/skala.php";
    }elseif ($_GET['module']=='matrix'){
        include "modul/mod_matrix/matrix.php";
    }else{
        echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    }
?>