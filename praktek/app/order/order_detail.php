<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

	$id=$_GET['id'];
	$sql = mysqli_query($conn, "SELECT user.nama_user FROM pesan INNER JOIN user ON pesan.id_user = pesan.id_user WHERE pesan.id_order='$id'") or die (mysqli_error());

	$row = mysqli_fetch_array($sql);
?>

<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Detail pesan - <a href="?modul=order" style="text-decoration: none">Halaman pesan</a></span>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td colspan="3">
			<table>
				<tr>
					<td><span style="font-size: 18px">Nama Peminjam : <?=$row['nama_user']?></span></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NOMOR MEJA</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA MASAKAN</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">KETERANGAN</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">STATUS </th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql1 = mysqli_query($conn, "SELECT detail_order.*, pesan.no_meja, masakan.nama_masakan, pesan.status_order FROM detail_order INNER JOIN pesan ON detail_order.id_order = pesan.id_order INNER JOIN masakan ON detail_order.id_masakan = masakan.id_masakan WHERE detail_order.id_order ='$id'") or die (mysqli_error());
					while ($rs=mysqli_fetch_array($sql1)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['no_meja'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_masakan'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['keterangan'].'</td>

								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">';
								if($rs['status_order']=='1')
									{
										echo '<b style="color:red">Masih Di Pinjem</b>';
									}else{
										echo '<b>Selesai</b>';
									}
								echo '</td>
								
							</tr>';
						    
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
