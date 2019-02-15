
<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['islogin'])==True){header("location:template/login.php");}

	if(isset($_POST['simpan']))
	{
		$jns = $_POST['jns_inventaris'];
		$kd = $_POST['kd_inventaris'];
		$nm = $_POST['nm_inventaris'];
		$jml = $_POST['jml_inventaris'];
		$kds = $_POST['kondisi_inventaris'];
		$rng = $_POST['ruang_inventaris'];
		$ket = $_POST['ket_inventaris'];
		$pts = $_POST['id_petugas'];

		mysqli_query($conn, "INSERT INTO inventaris (
			kode_inventaris,nama,kondisi,keterangan,jumlah,id_jenis,id_ruang,id_petugas) values ('$kd','$nm','$kds','$ket','$jml','$jns','$rng','$pts')");

		header('location:?modul=inventaris');
	}
?>
		<form method="post">
			<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<tr>
					<td colspan="3"><span style="font-size: 24x;"> Tambah Inventaris - <a href="?modul=inventaris" style="text-decoration: none"> Halaman Inventaris </a></span></td>
				</tr>
				<tr>
					<td colspan="3">
						<table>
						<tr>
							<td colspan="3"><b>Note:</b></td>
						</tr>
						<tr>
					<td>1.</td>
					<td> Jika Data jenis inventaris belum ada di database silahkan klik button</td>
					<td><a href="?modul=jenis-inventaris">Tambah Data</a></td>
						</tr>
						<tr>
					<td>2.</td>
					<td> Jika Data ruang penempatan data inventaris belum ada di database silahkan klik button </td>
					<td><a href="?modul=ruang-inventaris">Tambah Data</a></td>
						</tr>
					
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td style="width: 200px;">Jenis Inventaris</td>
		<td style="width: 1px;">:</td>
		<td>
			<select name="jns_inventaris" id="jns_inventaris">
			<?php
				$sql=mysqli_query($conn, "SELECT * FROM jenis ORDER BY id_jenis");
				{
					echo '<caption value="'.$rs['id_jenis'].'">'.$rs['kode_jenis'].'-'.$rs['nama_jenis'].'</caption>';
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td style="width: 200px;">Kode Inventaris</td>
		<td style="width: 1px;">:</td>
		<td><input type ="text" name="kd_inventaris" id="kd_inventaris"></td>
	</tr>
	<tr>
		<td style="width: 200px;">Nama Inventaris</td>
		<td style="width: 1px;">:</td>
		<td><input type ="text" name="nm_inventaris" id="nm_inventaris"></td>
	</tr>
	<tr>
		<td style="width: 200px;">Jumlah Barang</td>
		<td style="width: 1px;">:</td>
		<td><input type ="text" name="jml_inventaris" id="jml_inventaris"></td>
	</tr>
	<tr>
	<td style="width: 200px;">Kondisi Barang</td>
		<td style="width: 1px;">:</td>
	<td>
		<select name="kondisi_inventaris" id="kondisi_inventaris">
			<option value="Baik">Baik</option>
			<option value="Rusak">Rusak</option>
		</select>
	</td>
</tr>
<tr>
	<td style="width: 200px;">Keterangan</td>
	<td style="width: 1px;">:</td>
	<td>
		<textarea name="ket_inventaris" id="ket_inventaris" rows="5" cols="30"></textarea>

	</td>
</tr>
<tr>
	<td style="width: 200px;">Ruangan</td>
	<td style="width: 1px;">:</td>
	<td>
		<select name="ruang_inventaris" id="ruang_inventaris">
		<?php
			$sql=mysqli_query($conn, "SELECT * FROM ruang ORDER BY id_ruang");
			while($rs=mysqli_fetch_array($sql))
			{
				echo '<option value="'.$rs['id_ruang'].'">'.$rs['kode_ruang'].'-'.$rs['nama_ruang'].'</option>';
			}
		?>
		</select>
	</td>
</tr>
<tr>
	<td style="width: 200px;">&nbsp;</td>
	<td style="width: 1px;">&nbsp;</td>
	<td>
		<input type="submit" name="simpan" id="simpan" value="SIMPAN">
		<input type="reset" name="reset" id="reset" value="RESET">
	</td>
</tr>
<tr>
	<td colspan="3"><hr></td>
</tr>
</table>
</from>