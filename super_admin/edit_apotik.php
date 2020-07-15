<?php

require('../db.php');
include("auth.php");
$id=$_REQUEST['id_apotik'];
$query = "SELECT * from apotik where id_apotik='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Apotik Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert_apotik.php">Insert New Apotik</a> | <a href="logout.php">Logout</a></p>
<h1>Update Apotik Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$nama_apotik = $_REQUEST['nama_apotik'];
$alamat_apotik =  $_REQUEST['alamat_apotik'];
$kontak_apotik =  $_REQUEST['kontak_apotik'];
$longitude =  $_REQUEST['longitude'];
$latitude =  $_REQUEST['latitude'];
// $submittedby = $_SESSION["username"];
$update="UPDATE `apotik` SET `nama_apotik` = '$nama_apotik',`alamat_apotik` = '$alamat_apotik',`kontak_apotik` = '$kontak_apotik',`longitude` = '$longitude',`latitude` = '$latitude' WHERE `apotik`.`id_apotik` = '$id';";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view_apotik.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id_apotik'];?>" />

<p><input type="text" name="nama_apotik" placeholder="Masukan Nama Apotik" required value="<?php echo $row['nama_apotik'];?>"/></p>
<p><input type="text" name="alamat_apotik" placeholder="Masukan Alamat" required value="<?php echo $row['alamat_apotik'];?>"/></p>
<p><input type="text" name="kontak_apotik" placeholder="Masukan Kontak" required value="<?php echo $row['kontak_apotik'];?>"/></p>
<p><input type="number" step="any" name="longitude" placeholder="Masukan longitude" required value="<?php echo $row['longitude'];?>"/></p>
<p><input type="number" step="any" name="latitude" placeholder="Masukan latitude" required value="<?php echo $row['latitude'];?>"/></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

</div>
</div>
</body>
</html>
