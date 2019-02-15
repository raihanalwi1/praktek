<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

	if(isset($_POST['simpan'])){
		$nm 	=	$_POST['nama_level'];
		

		mysqli_query($conn, "INSERT INTO tingkat (
			nama_level) values ('$nm')");

		header('location:?modul=level-user');

	}
?>
	<form method="post">
		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
			<tr>
				<td colspan="3"><span style="font-size: 24px;"> Tambah Tingkat - <a href="?modul=level-user" style="text-decoration: none">Tingkat</span></td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td colspan="3">
					<table>
						<tr>
							<td colspan="3"><b>Note:</b></td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td style="width: 200px"> Nama Tingkatnya </td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="nama_level" id="nama_level"></td>
			</tr>
			<tr>
				<td style="width: 200px">&nbsp;</td>
				<td style="width: 1px">&nbsp;</td>
				<td>
					<input type="submit" name="simpan" id="simpan" value="SIMPAN">
					<input type="reset" name="reset" id="reset" value="RESET">
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
		</table>
	</form>