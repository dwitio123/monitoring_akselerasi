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
    <center><a href="index.php?c=add">+ Tambah Produk</a></center>
    <a class="logout" href="index.php?e=logout">Logout</a>
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
                $no=1;
                while($row = $this->model->fetch($data)){
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
                    <a href="index.php?a=<?php echo $row['id']; ?>">Edit</a>
                    <a onClick="return confirm('Yakin ingin menghapus data?')" href="index.php?b=<?php echo $row['id']; ?>">Hapus</a>
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