<?php
    include('koneksi.php');
    
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' && password='$password'");
    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>alert('Berhasil login');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Username atau password salah');window.location='login.php';</script>";
    }

?>