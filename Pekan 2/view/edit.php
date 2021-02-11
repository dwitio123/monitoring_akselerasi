<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php?d=login");
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
    <center><h1>Edit Produk <?php echo $row['nama_produk']; ?> </h1></center>
    <form method="POST" action="" enctype="multipart/form-data">
    <input name="id" value="<?php echo $row['id']; ?>" hidden/>
    <section class="base">
        <div>
            <label>Nama Produk</label> 
            <input type="text" name="nama_produk" value=<?php echo $row['nama_produk']; ?>>
        </div>
        <div>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value=<?php echo $row['deskripsi']; ?>>
        </div>
        <div>
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" value=<?php echo $row['harga_beli']; ?>>
        </div>
        <div>
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" value=<?php echo $row['harga_jual']; ?>>
        </div>
        <div>
            <label>Gambar Produk</label>
            <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px";>
            <input type="file" name="gambar_produk">
        </div>
        <div>
            <button type="submit" name="submit">Simpan Perubahan</button>
        </div>
    </section>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $main = new produkController();
        $main->update();
    }
?>