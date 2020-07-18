<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Pemesanan Makanan</h3>
<hr>
<form method="POST">
<table>
	<tr>
		<td>Jenis Restoran</td>
		<td>:</td>
		<td><select name="restoran">
			<?php
   
                                 include 'koneksi.php';
                                
                                  $sql="select * from restoran";

                                  $hasil=mysqli_query($db,$sql);
                                  
                                  while ($data = mysqli_fetch_array($hasil)) {
                                  
                                 ?>
                                  <option value="<?php echo $data['id_restoran'];?>"><?php echo $data['restoran'];?></option>
                                <?php 
                                }
                                ?>
                              
                  </select>
		</td>
	</tr>
	<tr>
		<td>Menu Makanan</td>
		<td>:</td>
		<td><select name="menu">
			<?php
   
                                 include 'koneksi.php';
                                
                                  $sql="select * from menu ";

                                  $hasil=mysqli_query($db,$sql);
                                  
                                  while ($data = mysqli_fetch_array($hasil)) {
                                  
                                 ?>
                                  <option value="<?php echo $data['id_makanan'];?>"><?php echo $data['makanan'];?></option>
                                <?php 
                                }
                                ?>
                              
                  </select>
		</td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type="text" name="harga"></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>No HP</td>
		<td>:</td>
		<td><input type="text" name="hp"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email"></td>
	</tr>
	
</table>
<input type="submit" name="simpan" value="Simpan">
</form>
<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	$restoran = $_POST['restoran'];
	$menu = $_POST['menu'];
	$harga = $_POST['harga'];
	$nama = $_POST['nama'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];

	$query = mysqli_query($db, "INSERT INTO pemesanan(id_resto,id_makanan,harga,nama,hp,email) 
			VALUES ('$restoran','$menu','$harga','$nama','$hp','$email')");
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		echo '<script LANGUAGE="JavaScript">
            alert(" Data Berhasil Tersimpan")
            window.location.href="pemesanan.php";
            </script>'; 
	} else {
		// jika gagal tampilkan pesan kesalahan
		echo '<script LANGUAGE="JavaScript">
            alert(" Data Gagal Tersimpan")
            window.location.href="pemesanan.php";
            </script>'; 
	}

}

?>
</body>
</html>