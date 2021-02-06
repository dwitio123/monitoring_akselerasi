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

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto 10px auto;
        }

        table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
        }

        a {
            background-color: salmon;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            font-size: 12px;
        }

        .logout {
            float: right;
            margin-right: 200px;
            background-color: red;
            border: 0px;
            padding: 8px;
            color: white;
        }
    </style>
</head>
<body>
    <center><h1>Data Produk</h1></center>
    <center><a href="tambah_produk.php">+ Tambah Produk</a></center>
    <a class="logout" href="proses_logout.php">Logout</a>
    <br/>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM produk";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><?php echo number_format($row['harga_beli'],0 , ',', '.'); ?></td>
                <td><?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                <td style="text-align: center">
                    <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;">
                </td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>

            <?php
                $no++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>