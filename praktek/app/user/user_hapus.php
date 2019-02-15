<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True) {
		header("location:template/login.php");
	}
		$id = $_GET['id'];
		$delete = "DELETE FROM user WHERE id_user='$id'";
		$query = mysqli_query($conn,$delete);
		if($query)
		{
			header('location:?modul=user');
		}else{
			mysqli_error();
		}
	


?>