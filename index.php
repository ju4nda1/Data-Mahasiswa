<?php
// Create database connection using config file
include_once("koneksi.php");
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa_sis ORDER BY nim DESC");
?>
 
<html>
<head>    
    <title>Beranda</title>
    <link href="style.css" rel="stylesheet" type="text/css" /> 
</head>
 
<body bgcolor="white">
    <h2>Aplikasi Data Mahasiswa</h2>
    <div class="button_link"><a href="tambah.php">Tambah Anggota Baru</a></div>
<hr>


    
    <table class="tbl-qa" width='80%' border=1>
    <thead>
    <tr>
        <th class="table-header" wnimmhsth="20%">Nim</th> 
        <th class="table-header" wnimmhsth="20%">Nama</th> 
        <th class="table-header" wnimmhsth="20%">Jurusan</th>
        <th class="table-header" wnimmhsth="20%">Alamat</th> 
        <th class="table-header" wnimmhsth="20%" colspan="2">Update</th> 

    </tr>
    </thead>
    <tbody>     
            <?php
                if ($result->num_rows > 0) {        
                    while($row = $result->fetch_assoc()) {
            ?>
            <tr class="table-row" id="row-<?php echo $row["nim"]; ?>"> 
                <td class="table-row"><?php echo $row["nim"]; ?></td>
                <td class="table-row"><?php echo $row["nama"]; ?></td>
                <td class="table-row"><?php echo $row["jurusan"]; ?></td>
                <td class="table-row"><?php echo $row["alamat"]; ?></td>
                <!-- action -->
                <td class="table-row" colspan="2"><a href="Edit.php?nim=<?php echo $row["nim"]; ?>" class="link"><img title="Edit" src="icon/edit.png"/></a> <a href="delete.php?nim=<?php echo $row["nim"]; ?>" class="link"><img name="delete" nim="delete" title="Delete" onclick="return confirm('Yakin akan di Hapus?')" src="icon/delete.png"/></a></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>
