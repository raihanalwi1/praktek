<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}

	$kats = isset($_GET['kat']) ? $_GET['kat'] : '';	

	if(isset($_POST['btn_cari'])) {
		# code...
		$kat = $_POST['pinjam'];
		if ($kat=='0' or $kat=='1') {
			$awal = $_POST['awal'];
			$akhir = $_POST['akhir'];
			header('location:?modul=lap-peminjaman&kat='.$kat.'&awal='.$awal.'&akhir='.$akhir);
		}else{
			
			header('location:?modul=lap-peminjaman');
		}

	}
	if(isset($_GET['kat'])){
		$awal = $_GET['awal'];
		$akhir = $_GET['akhir'];

		 if ($_GET['kat']=='0') {
		 	# code...
		 	$sql = mysqli_query($conn, "SELECT peminjaman.*, detail_pinjam.*, pegawai.nama_pegawai, inventaris.nama FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai INNER JOIN detail_pinjam on detail_pinjam.no_faktur=peminjaman.no_faktur INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris WHERE peminjaman.tanggal_pinjam BETWEEN '$awal' AND '$akhir' ORDER BY id_peminjaman DESC");
		 }elseif ($_GET['kat']=='1') {
		 	# code...
		 	$sql = mysqli_query($conn, "SELECT peminjaman.*, detail_pinjam.*, pegawai.nama_pegawai, inventaris.nama FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai INNER JOIN detail_pinjam on detail_pinjam.no_faktur=peminjaman.no_faktur INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris WHERE peminjaman.tanggal_kembali BETWEEN '$awal' AND '$akhir' ORDER BY id_peminjaman DESC");
		 }
	}else{
		$sql = mysqli_query($conn, "SELECT peminjaman.*, detail_pinjam.*, pegawai.nama_pegawai, inventaris.nama FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai INNER JOIN detail_pinjam on detail_pinjam.no_faktur=peminjaman.no_faktur INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris ORDER BY id_peminjaman DESC");
	}
	
?>	
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data Laporan Peminjaman <a href="?modul=lap-peminjaman" style="text-decoration: none"></a></span>
		</td>
	</tr>
	<tr>
		<td><hr></td>
	</tr>
	<tr>
		<td>
			
			    <form method="post">
			    		<div>
			    			<?php 
			    				if ($kats=='0') {
			    					# code...
			    					echo '
			    						<input type="radio" name="pinjam" value="0" checked>Periode peminjaman

			    						<input type="radio" name="pinjam" value="1"> Periode pengembalian
			    						';
			    				}elseif ($kats=='1') {
			    					# code...

			    					echo '
			    						<input type="radio" name="pinjam" value="0">Periode peminjaman

			    						<input type="radio" name="pinjam" value="1" <checked>Periode pengembalian
			    						';
			    				}else{

			    					echo '
			    						<input type="radio" name="pinjam" value="0">Periode peminjaman

			    						<input type="radio" name="pinjam" value="1">Periode pengembalian
			    						';
			    				}
			    			?>
			    			<label>|| Tanggal Periode </label>
			    			<input type="text" name="awal" id="awal" placeholder="Tanggal Awal">

			    			<input type="text" name="akhir" id="akhir" placeholder="Tanggal akhir">
			    			<input type="submit" name="btn_cari" id="btn_cari">

			    			<span style="float: right;">
			    				<button name="btn_print" id="btn_print" onclick="print('cetak-laporan')">Cetak Laporan</button>
			    			</span>
			    		</div>
			    </form>
			 <hr>
			 </td>
			 </tr>
			 <tr>
			 	<td>
			 		<div id="cetak-laporan">
			 		<span style="font-size: 24px;font-weight: bold">
			 			Laporan Peminjaman 
			 		</span>
			 		<span style="font-size: 24px;font-weight: bold">
			 			SMK AL-BAHRI
			 		</span>
			 		
			 		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
				<thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TANGGAL PINJAM</th>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TANGGAL KEMBALI</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">PEGAWAI</th>
						<th style="width: 5%;border: 1px solid #000;padding: 3px;text-align: center;font-size: 12px;">BARANG</th>
						<th style="width: 5%;border: 1px solid #000;padding: 3px;text-align: center;font-size: 12px;">JUMLAH</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">STATUS</th>
					
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					


					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['tanggal_pinjam'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center">';
									if($rs['tanggal_kembali']=='0000-00-00')
										{
											echo '<b style="color:red">-</b>';
										}else{
											echo '<b>'.$rs['tanggal_kembali'].'</b>';
										}
										echo '</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">'.$rs['nama_pegawai'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">'.$rs['nama'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">'.$rs['jumlah'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;">';
								if($rs['status_peminjaman']=='1')
										{
												echo '<b style="color:red">Masih Di Pinjam</b>';
											}else{
												echo '<b>Selesai</b>';
											}
										
									echo '
									</td>
									
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
			</div>			
			    </form>
	
			 	</td>  

						
			
		</td>
	</tr>
</table>
,
<script>
	function print(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		var mywindow = window.open('','my div','height-800,width=1000');
			mywindow.document.write('<html><head><title>DATA LAPORAN</title>');
			mywindow.document.write('</head><body bgcolor="#ccc">');
			mywindow.document.write(printcontent);
			mywindow.document.write('</body></html>');
			mywindow.print();					
	}
</script>