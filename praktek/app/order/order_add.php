<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){
		header("location:template/login.php");
	}

	$user="";
	$tgl="";

	$query = "SELECT max(no_meja) as maxKode FROM pesan";
	$hasil = mysqli_query($conn,$query);
	$data  = mysqli_fetch_array($hasil);
	$kd = $data['maxKode'];
	$noUrut = (int) substr($kd, 2, 3);
	$noUrut++;
	$char = "M";
	$newID = $char . sprintf("%03s", $noUrut);
	
	if (isset($_POST['tambah'])) {
		# code...
		$nama_user = $_POST['nama_user'];
		$tanggal = $_POST['tanggal'];
		$ord = $_POST['id_order'];
		$msk	= $_POST['nama_masakan'];
		$id_user = $_POST['nama_user'];
		$jml = $_POST['jml'];

		$sql = mysqli_query($conn, "INSERT INTO temp_transaksi (id_user,id_masakan,id_order,jml) values ('$id_user','$msk','$ord','$jml')");
		if ($sql) {
			# code...
			header('location:?modul=order&aksi=add&user='.$nama_user.'&tgl='.$tanggal);
		}else{
			mysql_error();
		}
	}

	if (isset($_GET['user'])) {
		# code...
		$user = $_GET['user'];
		$tgl = $_GET['tgl'];

	}

	if (isset($_GET['del'])) {
		# code...
		$id = $_GET['del'];
		$delete = "DELETE FROM temp_transaksi WHERE id_temp='$id'";
		$query = mysqli_query($conn,$delete);

		if ($query) {
			# code...
			header('location:?modul=order&aksi=add&user='.$_GET['user'].'&tgl='.$_GET['tgl']);
		}else{
			mysqli_error();
		}
	}
	if(isset($_POST['simpan'])){
		$tgl = date('Y-m-d');
    $total= $_POST['total_harga'];
    $temp_order = mysqli_query($conn, "SELECT * FROM temp_transaksi ");
   
    while($res = mysqli_fetch_array($temp_order)){
      $io   = $res['id_order'];
      $nm   = $res['no_meja'];
      $iu   = $res['id_user'];
      $ket  = $res['keterangan'];
      $idm  = $res['id_masakan'];
      $qty  = $res['qty'];
      
      mysqli_query($conn, "INSERT INTO detail_order (id_order, id_masakan, qty, keterangan) VALUES ('$io', '$idm',' $qty', '$ket')");
    }
    
			mysqli_query($conn, "INSERT INTO pesan(id_order, no_meja,tanggal,id_user,keterangan, total_harga, status_order, status_transaksi) values ('$io', '$nm', '$tgl', '$iu', '$ket', '$total', '1', '1')");
			mysqli_query($conn, "TRUNCATE temp_transaksi");

			header('location:?modul=order');
		}
	
?>
	<form method="post">
		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
			<tr>
				<td colspan="3"><span style="font-size: 24px;"> Tambah pesan - <a href="?modul=order" style="text-decoration: none">Halaman pesan</a></span></td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
	<tr>
				<td style="width: 200px"> Id Order</td>
				<td style="width: 1px"> :</td>
				<td><input type="text" name="id_order" id="id_order" value="<?=$newID?>" readonly="readonly"></td>
			</tr>
			<tr>
				<td style="width: 200px">Nama User</td>
				<td style="width: 1px"> :</td>
				<td>
					<select name="nama_user" id="nama_user">
						<?php 
							$sql = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user");
							while ($rs=mysqli_fetch_array($sql)) {
								# code...
								if ($_GET['user']==$rs['id_user']) {
									# code...
									echo '<option value="'.$rs['id_user'].'">'.$rs['nama_user'].'</option>';
								}else{
									echo '<option value="'.$rs['id_user'].'">'.$rs['nama_user'].'</option>';
								}
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td style="width: 200px"> Nama Masakan</td>
				<td style="width: 1px"> :</td>
				<td>
					<select name="nama_masakan" id="nama_masakan">
						<?php
							$sql=mysqli_query($conn, "SELECT * FROM masakan ORDER BY id_masakan");
							while ($rs=mysqli_fetch_array($sql)) {
								# code...
								echo '<option value="'.$rs['id_masakan'].'">'.$rs['nama_masakan'].'- Rp.'.$rs['harga'].'</option>';
							}
						?>
					</select>
				</td>

			</tr>
			
			<tr>
				<td style="width: 200px"> Jumlah</td>
				<td style="width: 1px"> :</td>
				<td>
					<input type="text" name="jml" id="jml">
				</td>
			</tr>
			<tr>
				<td style="width: 200px">&nbsp;</td>
				<td style="width: 1px">&nbsp;</td>
				<td>
					<input type="submit" name="tambah" id="tambah" value="TAMBAH">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<hr>
					<span style="font-size: 24px;">Tambah pesan</span>
			
				</td>
			</tr>
		</table>
		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
			<tr>
				<td>
					<table style="width: 100%; border-collapse: 0px; border-spacing: 0px;">
						<thead>
							<tr>
								<th style="width: 3%;border:1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>

								<th style="width: 30%;border:1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA ITEM</th>

								<th style="width: 5%;border:1px solid #000;padding:3px;text-align: center;font-size: 12px;">JML</th>

								<th style="width: 10%;border:1px solid #000;padding:3px;text-align: center;font-size: 12px;">AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
								$no=1;
								$sql = mysqli_query($conn, "SELECT temp_transaksi.*, masakan.nama_masakan FROM temp_transaksi INNER JOIN masakan ON temp_transaksi.id_masakan=masakan.id_masakan ORDER BY id_temp ASC");
								while ($rs=mysqli_fetch_array($sql)) {
									# code...
									echo '
										<tr>
											<td style="border:1px solid #000;padding:3px;font-size:12px;text-align:center;">'.$no.'</td>

											<td style="border:1px solid #000;padding:3px;font-size:12px;text-align:center;">'.$rs['nama_masakan'].'</td>

											<td style="border:1px solid #000;padding:3px;font-size:12px;text-align:center;">'.$rs['jml'].'</td>

											<td style="border:1px solid #000;padding:3px;font-size:12px;text-align:center;">
											<a href="?modul=pesan&aksi=del&user='.$user.'&tgl='.$tgl.'&del='.$rs['id_temp'].'" style="padding:5px;">Hapus</a>
											</td>

										</tr>';
										$no++;
								}
							?>

						</tbody>
						<tfoot>
							<tr>
								<th colspan="4" style="text-align: left">
									&nbsp;
								</th>
							</tr>

							<tr>
								<th colspan="4" style="text-align: right">	
								<input type="submit" name="simpan" id="simpan" value="SIMPAN">
								<input type="submit" name="reset" id="reset" value="RESET">
								</th>
							</tr>
							<tr>
								<th colspan="4" style="text-align: left">
									<hr>
								</th>
							</tr>
						</tfoot>
					</table>	
				</td>
			</tr>	
		</table>
		
	</form>