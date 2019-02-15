<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

?>
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data user - <a href="?modul=user&aksi=add" style="text-decoration: none">Tambah user</a></span>
		</td>
	</tr>
	<tr>
		<td><hr> Note : Untuk Menambahkan Level anda perlu membuat data > <a href="?modul=level-user">Tambah Level</a></td>
		
	</tr>
		<td><hr>&nbsp;</td>
	<tr>
		<td>
	
			<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">USERNAME</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA USER</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">LEVEL</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT user.*, tingkat.nama_level FROM user INNER JOIN tingkat ON user.id_level = tingkat.id_level ORDER BY user.id_user ASC");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['username'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_user'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_level'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">
									<a href="?modul=user&aksi=edit&id='.$rs['id_user'].'" style="padding: 5px;"> Edit </a>
									<a href="?modul=user&aksi=hapus&id='.$rs['id_user'].'" style="padding: 5px;"> hapus </a>
									
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
