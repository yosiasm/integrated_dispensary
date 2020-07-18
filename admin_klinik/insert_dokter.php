<?php
 
 
require('../db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$role_code = '3';
$trn_date = date("Y-m-d H:i:s");

$nama = $_REQUEST['nama'];
$alergi_obat = $_REQUEST['alergi_obat'];
$tanggal_lahir = $_REQUEST['tanggal_lahir'];
$berat_badan = $_REQUEST['berat_badan'];
$alamat = $_REQUEST['alamat'];
$kontak_person = $_REQUEST['kontak_person'];
$longitude =  $_REQUEST['longitude'];
$latitude =  $_REQUEST['latitude'];

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$temp_id = uniqid();

// insert to person
$ins_query="INSERT INTO `person` (`id_person`, `nama`, `alergi_obat`, `tanggal_lahir`, `berat_badan`, `alamat`, `longitude`, `latitude`, `kontak_person`,`temp_id`) VALUES (NULL, '$nama', '$alergi_obat', '$tanggal_lahir', '$berat_badan', '$alamat', '$longitude', '$latitude', '$kontak_person','$temp_id');";
mysqli_query($con,$ins_query) or die(mysql_error());

//find id person
$ins_query="SELECT * FROM person WHERE temp_id='$temp_id'";
$result = mysqli_query($con,$ins_query);
while($row = mysqli_fetch_assoc($result)) {
	$id_person = $row['id_person'];
}
//insert into credential
$ins_query="INSERT INTO `credential` (`id_credential`, `id_person_credential`, `id_role_credential`, `password`, `username`, `temp_id`) VALUES (NULL, '$id_person', '$role_code', '$password', '$username','$temp_id');";
mysqli_query($con,$ins_query) or die(mysql_error());

//find id credential
$ins_query="SELECT * FROM credential WHERE temp_id='$temp_id'";
$result = mysqli_query($con,$ins_query);
while($row = mysqli_fetch_assoc($result)) {
	$id_credential = $row['id_credential'];
}

//insert into dokterOnklinik
$ins_query="INSERT INTO `dokterOnklinik` (`id_dokterOnklinik`,`id_dokter`, `id_klinik`) VALUES (null,'$id_credential', '".$_SESSION['id_role_detail_apotik']."');";
mysqli_query($con,$ins_query) or die(mysql_error());

$status = "New Record Inserted Successfully.</br></br><a href='view_dokter.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Dokter</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_dokter.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Insert New Dokter</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="username" placeholder="Masukan username" required /></p>
<p><input type="text" name="password" placeholder="Masukan password" required /></p>

<p><input type="text" name="nama" placeholder="Masukan Nama" required /></p>
<p><input type="text" name="alergi_obat" placeholder="Masukan Keterangan Alergi Obat" required /></p>
<p><input type="date" name="tanggal_lahir" required /></p>
<p><input type="number" name="berat_badan" placeholder="Masukan Berat Badan" required /></p>
<p><input type="text" name="alamat" placeholder="Masukan Alamat" required /></p>
<p><input type="text" name="kontak_person" placeholder="Masukan Nomor Telp" required /></p>
<p><input type="number" step="any" name="longitude" placeholder="Masukan longitude" required /></p>
<p><input type="number" step="any" name="latitude" placeholder="Masukan latitude" required /></p>



<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>
</div>
</body>
</html>
