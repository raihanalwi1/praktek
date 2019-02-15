<?php
	$modul = isset($_GET['modul']) ? $_GET['modul'] : '';
	$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
		if($modul=="dashboard"){
			include 'app/home.php';

		}elseif($modul=="search"){
			include 'app/search';
		
		}elseif ($modul=="order") {
			if($aksi=="add"){
				include 'app/order/order_add.php';
			}elseif ($aksi=="detail") {
				# code...
				include 'app/order/order_detail.php';
			
			}else{
			include 'app/order/order.php';
			# code...
			}
		}elseif($modul=="masakan"){
			if($aksi=="add"){
				include 'app/masakan/masakan_add.php';
			}elseif($aksi=="edit") {
				include 'app/masakan/masakan_edit.php';
				# code...
			}elseif($aksi=="hapus") {
				include 'app/masakan/masakan_hapus.php';
				# code...
			}else{
				include 'app/masakan/masakan.php';
			}
		}elseif($modul=="transaksi"){
			if ($aksi=="add") {
				# code...
				include 'app/transaksi/transaksi_add.php';
			}elseif ($aksi=="edit") {
				# code...
				include 'app/transaksi/transaksi_edit.php';
			}elseif ($aksi=="hapus") {
				# code...
				include 'app/transaksi/transaksi_hapus.php';
			}else{
			include 'app/transaksi/transaksi.php';
			# code...
			}
		}elseif($modul=="user"){
			if ($aksi=="add") {
				# code...
				include 'app/user/user_add.php';
			}elseif($aksi=="hapus"){
				include 'app/user/user_hapus.php';
			}elseif($aksi=="edit"){
				include 'app/user/user_edit.php';
			}
			else{
				include 'app/user/user.php';
			}

		}elseif ($modul=="level-user") {
			# code...
			if ($aksi=="add") {
				# code...
				include 'app/user/level/tingkat_add.php';
			}elseif($aksi=="hapus"){
				include 'app/user/level/tingkat_hapus.php';
			}elseif($aksi=="edit"){
				include 'app/user/level/tingkat_edit.php';
			}else{
			include 'app/user/level/tingkat.php';
			}
		}elseif ($modul=="logout") {
			include 'template/logout.php';
			# code...
		}

?>