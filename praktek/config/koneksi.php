<?php
	//koneksi Mysqli dengan php native
	$host		= "localhost";
	$username	= "root";
	$password	= "";
	$dbName		= "test";

	$conn = mysqli_connect($host,$username,$password,$dbName);
	if (!$conn) {
		# code...
		echo '<h3> Database belum terhubung / tidak terkoneksi database... </h3>';

	}

	
	
?>