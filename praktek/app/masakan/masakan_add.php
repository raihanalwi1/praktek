<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

	if(isset($_POST['simpan'])){
		$nm 	=	$_POST['nama_masakan'];
		$harga 	=	$_POST['harga'];
		$stat	=	$_POST['status_masakan'];

		

		mysqli_query($conn, "INSERT INTO masakan (nama_masakan,harga,status_masakan) values ('$nm','$harga','$stat')");

		header('location:?modul=masakan');

	}
?>
	<form method="post">
		<table style="width: 100%;border-collapse: 0px;bmasakan-spacing: 0px;">
			<tr>
				<td colspan="3"><span style="font-size: 24px;"> Tambah Menu - <a href="?modul=masakan" style="text-decoration: none">Halaman Masakan</span></td>
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
				<td style="width: 200px"> Nama Masakan</td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="nama_masakan" id="nama_masakan"></td>
			</tr>
			<tr>
				<td style="width: 200px;">Harga</td>
				<td style="width: 1px;">:</td>
				<td><input type="text" name="harga" id="harga"></td>
			</tr>
			<tr>
				<td style="width: 200px"> Status masakan</td>
				<td style="width: 1px"> :</td>
				<td>
					<select name="status_masakan" id="status_masakan">
						<option value="1">Tersedia</option>
						<option value="0">Kosong</option>
					</select>
				</td>
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