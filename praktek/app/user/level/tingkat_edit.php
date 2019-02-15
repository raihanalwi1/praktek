<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM tingkat WHERE id_level='$id'");
$row = mysqli_fetch_array($sql);

if (isset($_POST['edit'])) {
	# code...
	
	$lvl    = $_POST['nama_level'];
	$id 	= $_POST['id'];


	$update = "UPDATE tingkat set nama_level='$lvl' WHERE id_level='$id'";
	$query = mysqli_query($conn,$update);

	if($query){
		header('location:?modul=level-user');

	}else{
		mysqli_error();
	}
}
?>

<form method="post">
	<table style="width: 100%;border-collapse: 0px;border">
		<tr>
			<td colspan="3"><span style="font-size: 24px;"> Edit user - <a href="?modul=user">Halaman user</span></td>
		</tr>
		<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td style="width: 200px"> Nama Tingkat</td>
				<td style="width: 1px"> :</td>
				<td>
					<input type="text" name="nama_level" id="nama_level" value="<?=$row['nama_level']?>" ">
					<input type="hidden" name="id" id="id" value="<?=$row['id_level']?>">
				</td>
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