<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

?>
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data masakan - <a href="?modul=masakan&aksi=add" style="text-decoration: none">Tambah masakan</a></span>
		</td>
	</tr>
	<tr>
		<td><hr></td>
	</tr>
	<tr>
		<td>
			<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA MASAKAN</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">HARGA</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">STATUS</th>

						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT * FROM masakan");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_masakan'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">Rp. '.$rs['harga'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">';
								if($rs['status_masakan']=='1')
										{
											echo '<b style="color:red">Tersedia</b>';
										}else{
											echo '<b> Stok Habis</b>';
										}
										echo '</td>
								<td style="border:1px solid #000;padding:3px;font-size: 12px;text-align: center;">';
										if($rs['status_masakan']=='1')
										{
											echo '<a href="?modul=masakan&stok='.$rs['id_masakan'].'" style="padding:5px;"> Stok Habis</a>
													<a href="?modul=masakan&aksi=detail&id='.$rs['id_masakan'].'" style="padding:5px;"> Detail</a>';
										}else{
											echo '
											<a href="?modul=order&aksi=stok&id='.$rs['id_order'].'" style="padding:5px;"> Stok Tersedia</a>
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
