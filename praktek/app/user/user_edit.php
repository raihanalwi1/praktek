<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM petugas WHERE id_petugas='$id'");
$row = mysqli_fetch_array($sql);

if (isset($_POST['edit'])) {
	# code...
	$user 	= $_POST['username'];
	$pass	= $_POST['password'];
	$nm 	= $_POST['nama'];
	$lvl    = $_POST['level'];
	$id 	= $_POST['id'];


	$update = "UPDATE petugas set username='$user', password='$pass', nama_petugas='$nm', id_level='$lvl' WHERE id_petugas='$id'";
	$query = mysqli_query($conn,$update);

	if($query){
		header('location:?modul=petugas');

	}else{
		mysqli_error();
	}
}
?>

<form method="post">
	<table style="width: 100%;border-collapse: 0px;border">
		<tr>
			<td colspan="3"><span style="font-size: 24px;"> Edit Petugas - <a href="?modul=petugas">Halaman Petugas</span></td>
		</tr>
		<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td style="width: 200px"> Username</td>
				<td style="width: 1px"> :</td>
				<td>
					<input type="text" name="username" id="username" value="<?=$row['username']?>" ">
					<input type="hidden" name="id" id="id" value="<?=$row['id_petugas']?>">
				</td>
			</tr>
			<tr>
				<td style="width: 200px"> Password</td>
				<td style="width: 1px"> :</td>
				<td><input type="password" name="password" id="password" value="<?=$row['password']?>"></td>
			</tr>
			<tr>
				<td style="width: 200px"> Nama Petugas</td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="nama" id="nama" value="<?=$row['nama_petugas']?>"></td>
			</tr>
			<tr>
				<td style="width: 200px">Tingkat</td>
				<td style="width: 1px">:</td>
				<td>
					<select name="level" id="level">
						<?php
							$sql=mysqli_query($conn,"SELECT * FROM tingkat ORDER BY id_level");
							while ($rs=mysqli_fetch_array($sql)) 
						{
								# code...
								if($row['id_level'] == $rs['id_level'])
							{
								echo '<option value="'.$rs['id_level'].'" selected>'.$rs['nama_level'].'</option>';
							}else{
								echo '<option value="'.$rs['id_level'].'">'.$rs['nama_level'].'</option>';
							}
						}
						?>
					</select>
				</td>
			</tr>
			</tr>
			<tr>
				<td style="width: 200px;">&nbsp;</td>
				<td style="width: 1px;">&nbsp;</td>
				<td>
					<input type="submit" name="edit" id="edit" value="UBAH">
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
	</table>
</form>