<?php 

session_start();


if($_SESSION['status']!="sudah_login"){

header("location:ok.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan Makanan</title>
</head>
<body>
Selamat datang : <?php echo $_SESSION['nama']; ?></h1>
<hr>
<center>
	<h3>Data Pemesanan Makanan<br>
	Per <?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";

?> . 
</h3>
	
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Restoran</th>
			<th>Makanan</th>
			<th>Harga</th>
			<th>Nama Lengkap</th>
			<th>No. Hp</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
			include 'koneksi.php';
		$no = 1;
		$query = mysqli_query($db, "SELECT * FROM pemesanan JOIN restoran ON pemesanan.id = restoran.id_restoran") or die(mysqli_error($db));
		while ($data = mysqli_fetch_assoc($query)) {
			
		 ?>
			<td><?php echo $no?></td>
			<td><?php echo $data['restoran'];?></td>
			<td><?php echo $data['makanan'];?></td>
			<td><?php echo $data['harga'];?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['hp'];?></td>
			<td><?php echo $data['email'];?></td>
		</tr>
		<?php 
		$no++;
	}
	?>
	</tbody>
</table><br>
<a href="input.php">Tambah Data</a> 
<a href="pdf.php" target="_BLANK">Cetak PDF</a>
</center>
</body>
</html>