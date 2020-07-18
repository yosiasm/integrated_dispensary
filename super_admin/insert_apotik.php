<?php
 
 
require('../db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");

// `id_apotik`, `nama_apotik`, `alamat_apotik`, `kontak_apotik`, `longitude`, `latitude`
$nama_apotik = $_REQUEST['nama_apotik'];
$alamat_apotik =  $_REQUEST['alamat_apotik'];
$kontak_apotik =  $_REQUEST['kontak_apotik'];
$longitude =  $_REQUEST['longitude'];
$latitude =  $_REQUEST['latitude'];

// $submittedby = $_SESSION["username"];
$ins_query="INSERT INTO `apotik` (`id_apotik`, `nama_apotik`, `alamat_apotik`, `kontak_apotik`, `longitude`, `latitude`) VALUES (NULL, '$nama_apotik', '$alamat_apotik', '$kontak_apotik', '$longitude', '$latitude');";
echo $ins_query;
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view_apotik.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Apotik</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_apotik.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Insert New Apotik</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="nama_apotik" placeholder="Masukan Nama Apotik" required /></p>
<p><input type="text" name="alamat_apotik" placeholder="Masukan Alamat" required /></p>
<p><input type="text" name="kontak_apotik" placeholder="Masukan Kontak" required /></p>
<p><input type="number" step="any" name="longitude" placeholder="Masukan longitude" required /></p>
<p><input type="number" step="any" name="latitude" placeholder="Masukan latitude" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>
</div>
</body>
</html>
