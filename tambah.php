<?php
	if (isset($_POST['submit'])) {
		require_once("koneksi.php");
		$sql = $conn->prepare("INSERT INTO mahasiswa_sis (nim,nama,jurusan,alamat) VALUES (?, ?, ?, ?)");  
		$nim=$_POST['nim'];
		$nama = $_POST['nama'];
		$jurusan= $_POST['jurusan'];
		$alamat= $_POST['alamat'];
		$sql->bind_param("ssss",$nim, $nama, $jurusan, $alamat); 
		if($sql->execute()) {
			$success_message = "Input Data Berhasil";
		} else {
			$error_message = "Ada masalah dengan Penginputan";
		}
		$sql->close();   
		$conn->close();
	} 
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
	
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
  <title>Input Data Mahasiswa</title> 	
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form id="frmUser" method="post" action="">
<div class="button_link"><a href="index.php"> Daftar Data Mahasiswa </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Tambah Data Mahasiswa</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>NIM</label></td>
			<td><input type="text" name="nim" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td><label>Nama</label></td>
			<td><input type="text" name="nama" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td><label>Jurusan</label></td>
			<td><input type="text" name="jurusan" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td><label>Alamat</label></td>
			<td><input type="text" name="alamat" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>