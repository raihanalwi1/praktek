<?php 
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

		if(isset($_GET['selesai'])){
		$kmb = $_GET['selesai'];
		$tgl = date('Y-m-d');

		$sql = mysqli_query($conn, "SELECT * FROM detail_order WHERE id_order='$kmb'");
		while ($rs=mysqli_fetch_array($sql)) {
			$idv = $rs['id_masakan'];
			$jml = $rs['jumlah'];

			mysqli_query($conn, "UPDATE masakan set jumlah=jumlah-$jml WHERE id_masakan='$idv'");

			# code...
		}
		$query = mysqli_query($conn, "UPDATE pesan set status_order=0, tanggal='$tgl' WHERE id_order='$kmb'") or die (mysqli_error());
		if($query){
			header('location:?modul=order');
		}else{
			mysql_error();
		}
	}
?>
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data order - <a href="?modul=order&aksi=add" style="text-decoration: none">Tambah order</a></span>
		</td>
	</tr>
	<tr>
		<td><hr> Note : </td>
	</tr>
		<td><hr>&nbsp;</td>
	<tr>
		<td>
	
			<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA MEJA</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA USER</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA MASAKAN</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TANGGAL</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">KETERANGAN</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">STATUS</th>

						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT pesan.*, user.nama_user, masakan.nama_masakan FROM pesan INNER JOIN user ON pesan.id_user = user.id_user INNER JOIN masakan ON pesan.id_masakan = masakan.id_masakan ORDER BY pesan.id_order ASC");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['no_meja'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_user'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_masakan'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['tanggal'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['keterangan'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">';
								if($rs['status_order']=='1')
										{
											echo '<b style="color:red">Masih Di Pesan</b>';
										}else{
											echo '<b>Pesanan Telah Dibayar</b>';
										}
										echo '</td>
								<td style="border:1px solid #000;padding:3px;font-size: 12px;text-align: center;">';
										if($rs['status_order']=='1')
										{
											echo '<a href="?modul=order&selesai='.$rs['id_order'].'" style="padding:5px;"> selesai</a>
													<a href="?modul=order&aksi=detail&id='.$rs['id_order'].'" style="padding:5px;"> Detail</a>';
										}else{
											echo '
										<a href="?modul=order&aksi=detail&id='.$rs['id_order'].'" style="padding:5px;"> Detail</a>';
										}
									echo '
									</td>
							</tr>
						    ';
						    $no++;
					}
				?>
			</tbody>
			<tfoot>
				<tr colspan="7" style="text-align: left">
					<hr>
				</tr>
			</tfoot>
			</table>
		</td>
	</tr>
</table>