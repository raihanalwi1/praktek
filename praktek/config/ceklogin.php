<?php
	session_start();
	include 'koneksi.php';

	if($_POST['btn_login']){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$query = mysqli_query($conn,$sql) or die (mysqli_error());
		$num = mysqli_num_rows($query);
		if($num>0){

			$data = mysqli_fetch_array($query);
			$_SESSION['id_petugas'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama'] = $data['nama_user'];
			$_SESSION['level'] = $data['id_level'];
			$_SESSION['isLogin'] = True;

			header('location:../?modul=dashboard');
			// echo 'login sukses';

		}else{
			echo 'Username anda tidak sesuai dengan password ... <a href="../index.php"> Klik Login </a> ';
		}
	}


?>