<?php
    include('koneksi.php');

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD PHP</title>
    <style>
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;
        }

        button {
            background-color: salmon;
            color: #fff;    
            padding: 10px;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;   
            float: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin: auto;
            background: #ededed;
        }
    </style>
</head>
<body>
    <center><h1>Tambah Produk</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama Produk</label> 
            <input type="text" name="nama_produk" require="">
        </div>
        <div>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi">
        </div>
        <div>
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" require="">
        </div>
        <div>
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" require="">
        </div>
        <div>
            <label>Gambar Produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" require="">
        </div>
        <div>
            <button type="submit">Simpan Produk</button>
        </div>
    </section>
    </form>
</body>
</html>