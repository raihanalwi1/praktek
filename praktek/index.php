<?php 
	session_start();
	if(!isset($_SESSION['isLogin'])==true){header("location:template/login.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UKOM RPL</title>
</head>
<link rel="stylesheet" type="text/css" href="asset/style.css">
<body>
<nav>
	<ul class="kiri">
		<li><a href="">KANTIN AL-BAHRI</a></li>
	</ul>
	<ul class="kanan">
		<li><a href="?modul=logout"><?=strtoupper($_SESSION['nama'])?></a></li>
		<div style="clear:both"></div>
	</ul>
</nav>
<div class="sidebar">
		<ul>
			<li><a href="" readonly="readonly">FILE MASTER</a></li>
			
			<li><a href="?modul=dashboard">Dashboard</a></li>
			<li><a href="?modul=masakan">Data Masakan</a></li>
			<li><a href="?modul=order">Data Order</a></li>
			<li><a href="?modul=transaksi">Data Transaksi</a></li>
			<hr><td></td>
			&nbsp;
			<!-- <li>
				<a href="?modul=lap-peminjaman">File Laporan Peminjaman</a>
			</li>
			<li>
				<a href="?modul=lap-inventaris">File Laporan Inventaris</a>
			</li>
			 -->&nbsp;
			<hr><td></td>
			<li>
			<a href="?modul=user">Data User</a>
			</li>
		</ul>
	</div>
<div class="main">
	<div class="isimain">
<?php require_once('template/content.php');?>
		
	</div>
</div>

</body>
</html><!-- 
<tr>
			<td style="width: 15%; height: 100%; vertical-align: top;padding:  5px;">
				<table>
					<tr>
			<td style="width: 15%; height: 100%; vertical-align: top;padding:  5px;">
				<table>
					<tr>
						<td style="color:blue;padding: 3px;"><h2>MENU UTAMA</h2></td>
					</tr>
					<tr>
						<td style="color: red:padding3px;font-weight: bold">File Master</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=dashboard">Dashboard</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=inventaris">Data Inventaris</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=pegawai">Data Pegawai</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=peminjaman">Data Peminjaman</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=pengembalian">Data Pengembalian</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="color:red;padding: 3px;font-weight: bold">
							<a href="?modul=lap-periode">File Laporan</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=lap-peminjaman">Laporan Periode</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="color:red;padding: 3px;font-weight: bold">
							Setting
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=petugas">Data Petugas</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<a href="?modul=logout">Logout</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="color:red;padding: 3px;font-weight: bold">
							USER AKTIF
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							<b><?=strtoupper($_SESSION['nama'])?></b>
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="padding: 3px;">
							&nbsp;
						</td>
					</tr>
				</table>
			</td>
			<td style="width: 85%;height: 100%; vertical-align: top;padding: 5 5 5 10px;">
				<?php require_once('template/content.php');?>

			</td>
		</tr> -->