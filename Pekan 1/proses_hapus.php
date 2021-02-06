<?php
    include('koneksi.php');

    $id = $_GET['id'];

    $query = "DELETE FROM produk WHERE id='$id'";
    $hasil_query = mysqli_query($koneksi, $query);

    if (!$hasil_query) {
        echo json_encode(array("respon" => "gagal hapus"));
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }
?>