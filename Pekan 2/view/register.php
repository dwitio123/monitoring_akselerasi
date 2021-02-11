<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD PHP</title>
    <style>
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            color: salmon;
        }

        label {
            margin-top: 10px;
            float: left;
            width: 100%;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            padding: 6px;
            border: 2px solid #ccc;
        }

        .base {
            background-color: #DEDEDE;
            width: 400px;
            margin: auto;
            padding: 20px;
        }

        button {
            background-color: salmon;
            border: 0px;
            padding: 10px;
            margin-top: 10px;
            color: white;  
            font-size: 12px; 
        }
    </style>
</head>
<body>
    <center><h1>REGISTER</h1></center>
    <form action="" method="POST">
    <section class="base">
        <div>
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Ulangi Password</label>
            <input type="password" name="ulang_password">
        </div>
        <div>
            <button type="submit" name="submit">Register</button>
        </div>
        </section>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $main = new produkController();
        $main->register();
    }
?>