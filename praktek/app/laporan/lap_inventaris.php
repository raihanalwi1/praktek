<?php
	include 'config/koneksi.php';
	if(!isset($_SESSION['isLogin'])==True){header("location:template/login.php");}


    $cari = "";
	
	if(isset($_POST['btn_cari'])) {
		# code...
		if (empty($_POST['cari'])) {
			# code...
			$cari = null;
			header('location:?modul=lap-inventaris');
		}else{
			$cari = $_POST['cari'];
			header('location:?modul=lap-inventaris&cari='.$cari);
		}

	}
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
	}
?>	
<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
	<tr>
		<td>
			<span style="font-size: 24px;">Data laporan Inventaris <a href="?modul=inventaris&aksi=add" style="text-decoration: none"></a></span>
		</td>
	</tr>
	<tr>
		<td><hr></td>
	</tr>
	<tr>
		<td>
			
			   
			 <tr>
			 	<td>
                 <form method="post">
			    	<label> Berdasarkan yang dicari</label>
			    	<input type="text" name="cari" id="cari"></input>
			        <input type="submit" name="btn_cari" id="btn_cari" ></input>
			    </form>
			 <hr>
			
			 		<div id="cetak-laporan">
			 		<span style="font-size: 24px;font-weight: bold">
			 			Laporan inventaris 
			 		</span>
			 		<span style="font-size: 24px;font-weight: bold">
			 			SMK AL-BAHRI
			 		</span>
			 		
			 		<table style="width: 100%;border-collapse: 0px;border-spacing: 0px;">
                     <thead>
					<tr>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NO</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">KODE</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">TANGGAL REGISTER</th>
						<th style="width: 10%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">NAMA INVENTARIS</th>
						<th style="width: 3%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">JUMLAH</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">KONDISI</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">RUANG</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">JENIS</th>
						<th style="width: 5%;border: 1px solid #000;padding:3px;text-align: center;font-size: 12px;">KETERANGAN</th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=1;
					$sql = mysqli_query($conn, "SELECT inventaris.*, ruang.nama_ruang,jenis.nama_jenis FROM inventaris INNER JOIN ruang ON inventaris.id_ruang = ruang.id_ruang INNER JOIN jenis ON inventaris.id_jenis = jenis.id_jenis WHERE inventaris.tanggal_register LIKE '%$cari%' OR inventaris.nama LIKE '%$cari%' OR ruang.nama_ruang LIKE '%$cari%' OR jenis.nama_jenis LIKE '%$cari%'ORDER BY inventaris.id_inventaris ASC");
					while ($rs=mysqli_fetch_array($sql)) {
						# code...
						echo '
							<tr>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$no.'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['kode_inventaris'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['tanggal_register'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['jumlah'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['kondisi'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_ruang'].'</td>

								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['nama_jenis'].'</td>
								<td style="border: 1px solid #000;padding: 3px;font-size: 12px;text-align: center;">'.$rs['keterangan'].'</td>
								
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