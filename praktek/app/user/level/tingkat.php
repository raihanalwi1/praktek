<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

?>
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data Tingkat - <a href="?modul=level-user&aksi=add" style="text-decoration: none">Tambah tingkat</a></span>
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
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA Tingkat</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT * FROM tingkat");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_level'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">
									<a href="?modul=level-user&aksi=edit&id='.$rs['id_level'].'" style="padding: 5px;"> Edit </a>
									<a href="?modul=level-user&aksi=hapus&id='.$rs['id_level'].'" style="padding: 5px;"> hapus </a>
									
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
