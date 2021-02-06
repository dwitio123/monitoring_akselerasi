<?php
    include('koneksi.php');

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    if (isset($_GET['id'])){
        $id = ($_GET['id']);

        $query = "SELECT * FROM produk WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);

        $data = mysqli_fetch_assoc($result);
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
    <center><h1>Edit Produk <?php echo $data['nama_produk']; ?> </h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <input name="id" value="<?php echo $data['id']; ?>" hidden/>
    <section class="base">
        <div>
            <label>Nama Produk</label> 
            <input type="text" name="nama_produk" value=<?php echo $data['nama_produk']; ?>>
        </div>
        <div>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value=<?php echo $data['deskripsi']; ?>>
        </div>
        <div>
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" value=<?php echo $data['harga_beli']; ?>>
        </div>
        <div>
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" value=<?php echo $data['harga_jual']; ?>>
        </div>
        <div>
            <label>Gambar Produk</label>
            <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px";>
            <input type="file" name="gambar_produk">
        </div>
        <div>
            <button type="submit">Simpan Perubahan</button>
        </div>
    </section>
    </form>
</body>
</html>