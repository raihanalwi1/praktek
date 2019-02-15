<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

	if(isset($_POST['simpan'])){
		$user	=	$_POST['username'];
		$pass 	=	$_POST['password'];
		$nm 	=	$_POST['nama_user'];
		$lvl 	=	$_POST['id_level'];
		

		mysqli_query($conn, "INSERT INTO user (username,password,nama_user,id_level) values ('$user','$pass','$nm','$lvl')");

		header('location:?modul=user');

	}
?>
	<form method="post">
		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
			<tr>
				<td colspan="3"><span style="font-size: 24px;"> Tambah user - <a href="?modul=user" style="text-decoration: none"></span></td>
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
						<tr>
							<td>1.</td>
							<td>Jika data level user belum ada di database silahkan klik button</td>
							<td><a href="?modul=level-user">Tambah Data</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td style="width: 200px;">Level user</td>
				<td style="width: 1px;">:</td>
				<td>
					<select name="id_level" id="id_level">
						<?php
							$sql=mysqli_query($conn,"SELECT * FROM tingkat ORDER BY id_level");
							while ($rs=mysqli_fetch_array($sql)) {
								# code...
								echo '<option value="'.$rs['id_level'].'">'.$rs['nama_level'].'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="width: 200px"> Username user</td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="username" id="username"></td>
			</tr>
			<tr>
				<td style="width: 200px"> Password user</td>
				<td style="width: 1px"> :</td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
				<td style="width: 200px"> Nama user</td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="nama_user" id="nama_user"></td>
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