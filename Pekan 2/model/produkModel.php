<?php

    class produkModel {
        function __construct(){
			$connect = mysqli_connect("localhost", "root", "", "crud_php");
		}
		
		function execute($query){
			return mysqli_query(mysqli_connect("localhost", "root", "", "crud_php"), $query);
		}

        function loginUser($username, $password){
            $query = "select * from user where username='$username' && password='$password'";
            return $this->execute($query);
        }

		function registerUser($username, $password){
			$query = "insert into user (username, password) values ('$username', '$password')";
			return $this->execute($query);
		}
		
		function selectAll(){
			$query = "select * from produk";
			return $this->execute($query);
		}
		
		function selectProduk($id){
			$query = "select * from produk where id='$id'";
			return $this->execute($query);
		}

		function insertProduk($nama_produk, $deskripsi, $harga_beli, $harga_jual, $gambar_produk){
			$query = "insert into produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) values ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$gambar_produk')";
			return $this->execute($query);
		}
		
		function updateProduk($id, $nama_produk, $deskripsi, $harga_beli, $harga_jual, $gambar_produk){
			$query = "update produk set id='$id', nama_produk='$nama_produk', deskripsi='$deskripsi', harga_beli='$harga_beli', harga_jual='$harga_jual', gambar_produk='$gambar_produk' where id='$id'";
			return $this->execute($query);
		}
		
		function deleteProduk($id){
			$query = "delete from produk where id='$id'";
			return $this->execute($query);
		}
		
		function fetch($var){
			return mysqli_fetch_array($var);
		}

        function rows($var){
            return mysqli_num_rows($var);
        }
		
		function __destruct(){
		}
    }
?>