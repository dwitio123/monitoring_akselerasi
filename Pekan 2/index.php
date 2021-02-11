<?php
    //include class controller
	include "controller/produkController.php";
	
	//variabel main merupakan objek baru yang dibuat dari class controller
	$main = new produkController();
	
	//kondisi untuk menampilkan halaman web yang diminta
	if(isset($_GET['a'])){ //kondisi untuk mengakses halaman edit
		$id = $_GET['a'];
		$main->viewEdit($id);
	}else if(isset($_GET['b'])){ //kondisi untuk menghapus data (mengakses fungsi delete)
		$id = $_GET['b'];
		$main->delete($id);
	}else if(isset($_GET['c'])){
		$main->viewInsert(); //kondisi untuk mengakses halaman add
	}else if(isset($_GET['d'])){
        $main->viewLogin(); //kondisi untuk mengakses halaman login
    }else if(isset($_GET['e'])){
        $main->logout(); //kondisi untuk logout
    }else if(isset($_GET['f'])){
        $main->viewRegister(); //kondisi untuk mengakses halaman register
    }else{
		$main->index(); //kondisi awal (menampilkan seluruh data)
	}