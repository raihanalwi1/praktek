<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True) {
		header("location:template/login.php");
	}
		$id = $_GET['id'];
		$delete = "DELETE FROM tingkat WHERE id_level='$id'";
		$query = mysqli_query($conn,$delete);
		if($query)
		{
			header('location:?modul=level-user');
		}else{
			mysqli_error();
		}
	


?>