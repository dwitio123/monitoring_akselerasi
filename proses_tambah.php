<?php
    include('koneksi.php');

    $nama_produk    = $_POST['nama_produk'];
    $deskripsi      = $_POST['deskripsi'];
    $harga_beli     = $_POST['harga_beli'];
    $harga_jual     = $_POST['harga_jual'];
    $gambar_produk  = $_FILES['gambar_produk']['name'];

    if($gambar_produk != ""){
        $extensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar_produk);
        $extensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
            if(in_array($extensi, $extensi_diperbolehkan) === true) {
                move_uploaded_file($file_tmp, 'gambar/'.$gambar_produk);

                $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES 
                ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$gambar_produk')";

                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die ("Query gagal jalan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                }
            } else {
                echo "<script>alert('Extensi gambar cuma boleh jpg atau png');window.location='tambah_produk.php';</script>";
            }
    } else {
        $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES 
                ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', NULL)";

                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die ("Query gagal jalan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                }
    }
?>