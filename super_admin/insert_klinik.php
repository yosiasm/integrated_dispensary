<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('../db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");

$nama_klinik = $_REQUEST['nama_klinik'];
$alamat_klinik =  $_REQUEST['alamat_klinik'];
$kontak_klinik =  $_REQUEST['kontak_klinik'];
$longitude =  $_REQUEST['longitude'];
$latitude =  $_REQUEST['latitude'];

// $submittedby = $_SESSION["username"];
$ins_query="INSERT INTO `klinik` (`id_klinik`, `nama_klinik`, `alamat_klinik`, `kontak_klinik`, `longitude`, `latitude`) VALUES (NULL, '$nama_klinik', '$alamat_klinik', '$kontak_klinik', '$longitude', '$latitude');";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view_klinik.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Klinik</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_klinik.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Insert New Klinik</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="nama_klinik" placeholder="Masukan Nama Klinik" required /></p>
<p><input type="text" name="alamat_klinik" placeholder="Masukan Alamat" required /></p>
<p><input type="text" name="kontak_klinik" placeholder="Masukan Kontak" required /></p>
<p><input type="number" step="any" name="longitude" placeholder="Masukan longitude" required /></p>
<p><input type="number" step="any" name="latitude" placeholder="Masukan latitude" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>
</div>
</body>
</html>
