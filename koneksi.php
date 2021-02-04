<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_php";
    $koneksi = mysqli_connect($host, $user, $pass, $db);

    if(!$koneksi) {
        die ("Koneksi dengan database: " .mysql_connect_error());
    }
?>