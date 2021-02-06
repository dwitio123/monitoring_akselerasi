<?php
    include('koneksi.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $ulang_password = $_POST['ulang_password'];

    if ($password == $ulang_password){

        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $sql = mysqli_query($koneksi, $query);
        echo "<script>alert('Register berhasil');window.location='login.php';</script>";
        
    } else {
        echo "<script>alert('Password tidak sama');window.location='register.php'</script>";
    }
?>