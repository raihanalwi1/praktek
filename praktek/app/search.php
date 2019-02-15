<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

?>
<div class="content-title">.:: Hasil Pencarian ::.</div>
<div class="content-body">
	
</div>
<?php
	

	$key = $_GET['keyword'];
	$sql = mysqli_query("SELECT * FROM peminjaman WHERE kode_inventaris INNER JOIN petugas ON peminjaman.id_petugas LIKE '%$key%' ORDER BY id_peminjaman DESC");
	

	if(mysqli_num_rows($sql) == 0){
		echo 'Hasil pencarian tidak menemukan hasil.';
	}else{
		echo 'Hasil pencarian untu kata kunci <b>'.$key.'</b>:';
		while($data = mysqli_fetch_assoc($sql)){			
			 echo '<div class="kotak">';
			echo '<div class="kode">'.$data['kode_peminjaman'].'</div>';
			echo $data['id_petugas'];
			
			echo '</div>';
			echo '</div>';
		}
	}
	?>