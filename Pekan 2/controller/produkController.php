<?php
    require 'model/produkModel.php';

    class produkController{
		//variabel public
		public $model;
		
		//inisialisasi awal untuk class
		function __construct(){
			$this->model = new produkModel(); //variabel model merupakan objek baru yang dibuat dari class model
		}
		
		function index(){
			$data = $this->model->selectAll(); //pada class ini (controller), akses variabel model, akses fungsi selectAll
			include "view/view.php"; //memanggil view.php pada folder view
		}
		
		function viewEdit($id){
			$data = $this->model->selectProduk($id); //select data produk dengan id
			$row = $this->model->fetch($data); //fetch hasil select
			include "view/edit.php"; //menampilkan halaman untuk mengedit data
		}
		
		function viewInsert(){
			include "view/tambah.php"; //menampilkan halaman add data
		}

        function viewLogin(){
            include "view/login.php"; //menampilkan halaman login
        }
        
        function viewRegister(){
            include "view/register.php"; //menampilkan halaman register
        }
		
        //fungsi tambah produk
        function insert(){
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

                        $insert = $this->model->insertProduk($nama_produk, $deskripsi, $harga_beli, $harga_jual, $gambar_produk);

                        if(!$insert) {
                            die ("Query gagal jalan");
                        } else {
                            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Extensi gambar cuma boleh jpg atau png');window.location='index.php?c=add';</script>";
                    }
            } else {

                    $insert = $this->model->insertProduk($nama_produk, $deskripsi, $harga_beli, $harga_jual, NULL);

                    if(!$insert) {
                        die ("Query gagal jalan");
                    } else {
                        echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                    }
            }
        }

		//fungsi edit produk
		function update(){
			$id             = $_POST['id'];
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
                        move_uploaded_file($file_tmp, 'gambar/' . $gambar_produk);

                        $update = $this->model->updateProduk($id, $nama_produk, $deskripsi, $harga_beli, $harga_jual, $gambar_produk);

                        if(!$update) {
                            die ("Query gagal jalan");
                        } else {
                            echo "<script>alert('Data berhasil diedit.');window.location='index.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Extensi gambar cuma boleh jpg atau png');window.location='index.php';</script>";
                    }
            } else {
                $update = $this->model->updateProduk($id, $nama_produk, $deskripsi, $harga_beli, $harga_jual);

                if(!$update) {
                    die ("Query gagal jalan");
                } else {
                    echo "<script>alert('Data berhasil diedit.');window.location='index.php';</script>";
                }
            }
		}
		
        //fungsi hapus produk
		function delete($id){
			$delete = $this->model->deleteProduk($id);
			header("location:index.php");
		}

        //fungsi register user
        function register(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ulang_password = $_POST['ulang_password'];

            if ($password == $ulang_password){

                $register = $this->model->registerUser($username, $password);
                echo "<script>alert('Register berhasil');window.location='index.php';</script>";
                
            } else {
                echo "<script>alert('Password tidak sama');window.location='index.php?f=register'</script>";
            }
        }

        //fungsi login user
        function login(){
            session_start();

            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $this->model->loginUser($username, $password);
            $cek = $this->model->rows($login);
            if ($cek > 0){
                $_SESSION['username'] = $username;
                echo "<script>alert('Berhasil login');window.location='index.php';</script>";
            } else {
                echo "<script>alert('Username atau password salah');window.location='index.php?d';</script>";
            }
        }

        //fungsi hapus session
        function logout(){
            session_start();
            $_SESSION['username'] = '';
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
            header("Location: index.php");
        }
				
		function __destruct(){
		}
	}
?>