<?php 
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

?>
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data Transaksi - <a href="?modul=transaksi&aksi=add" style="text-decoration: none">Tambah Transaksi</a></span>
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
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA USER</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">ID ORDER </th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TANGGAL</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TOTAL BAYAR</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT transaksi.*, user.nama_user, pesan.no_meja FROM transaksi INNER JOIN user ON transaksi.id_user = user.id_user INNER JOIN pesan ON transaksi.id_order = pesan.id_order ORDER BY transaksi.id_transaksi ASC");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_user'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['no_meja'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['tanggal'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">Rp. '.$rs['total_bayar'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">
									<a href="?modul=transaksi&aksi=edit&id='.$rs['id_transaksi'].'" style="padding: 5px;"> Edit </a>
									<a href="?modul=transaksi&aksi=hapus&id='.$rs['id_transaksi'].'" style="padding: 5px;"> hapus </a>
									
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