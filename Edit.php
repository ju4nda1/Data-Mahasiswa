<?php
	require_once("koneksi.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE mahasiswa_sis SET nama=? , jurusan=? , alamat=? WHERE nim=?");
		$nama = $_POST['nama'];
		$jurusan= $_POST['jurusan'];
		$alamat= $_POST['alamat'];
		$sql->bind_param("ssss",$nama, $jurusan, $alamat, $_GET["nim"]);	
		if($sql->execute()) {
			$success_message = "Update Data Berhasil";
		} else {
			$error_message = "Ada masalah update data";
		}

	}
	$sql = $conn->prepare("SELECT * FROM mahasiswa_sis WHERE nim=?");
	$sql->bind_param("s",$_GET["nim"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>Edit Mahasiswa </title>
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="index.php" > Lihat Data Mahasiswa </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Edit Data Mahasiswa</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Nama</label></td>
			<td><input type="text" name="nama" class="txtField" value="<?php echo $row["nama"]; ?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Jurusan</label></td>
			<td><input type="text" name="jurusan" class="txtField" value="<?php echo $row["jurusan"]; ?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Alamat</label></td>
			<td><input type="text" name="alamat" class="txtField" value="<?php echo $row["alamat"]; ?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Update" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>