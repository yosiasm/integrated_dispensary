<?php

require('../db.php');
include("auth.php");
$id=$_REQUEST['id_kurir'];
$query = "SELECT * FROM kurirOnApotik INNER JOIN credential on kurirOnApotik.id_kurir=credential.id_credential INNER JOIN person on credential.id_person_credential=person.id_person WHERE id_kurir=".$id." AND id_apotik=".$_SESSION['id_role_detail_apotik']." ;";

$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Kurir Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert_kurir.php">Insert New Kurir</a> | <a href="logout.php">Logout</a></p>
<h1>Update Kurir Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$nama = $_REQUEST['nama'];
$alergi_obat =  $_REQUEST['alergi_obat'];
$tanggal_lahir =  $_REQUEST['tanggal_lahir'];
$berat_badan =  $_REQUEST['berat_badan'];
$alamat =  $_REQUEST['alamat'];
$kontak_person =  $_REQUEST['kontak_person'];
$longitude =  $_REQUEST['longitude'];
$latitude =  $_REQUEST['latitude'];
$temp_id = $row['temp_id'];
// $submittedby = $_SESSION["username"];
$update="UPDATE `person` SET `nama` = '$nama', `alergi_obat` = '$alergi_obat', `tanggal_lahir` = '$tanggal_lahir', `berat_badan` = '$berat_badan', `alamat` = '$alamat', `longitude` = '$longitude', `latitude` = '$latitude', `kontak_person` = '$kontak_person' WHERE `person`.`temp_id` = '$temp_id';";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view_kurir.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id_dokter'];?>" />

<p><input type="text" name="nama" placeholder="Masukan nama" required value="<?php echo $row['nama'];?>"/></p>
<p><input type="text" name="alergi_obat" placeholder="Masukan Keterangan Alergi Obat" required value="<?php echo $row['alergi_obat'];?>"/></p>
<p><input type="date" name="tanggal_lahir" required value="<?php echo $row['tanggal_lahir'];?>"/></p>
<p><input type="number" name="berat_badan" required value="<?php echo $row['berat_badan'];?>"/></p>
<p><input type="text" name="alamat" placeholder="Masukan Alamat" required value="<?php echo $row['alamat'];?>"/></p>
<p><input type="text" name="kontak_person" placeholder="Masukan Nomor Telp" required value="<?php echo $row['kontak_person'];?>"/></p>
<p><input type="number" step="any" name="longitude" required value="<?php echo $row['longitude'];?>"/></p>
<p><input type="number" step="any" name="latitude" required value="<?php echo $row['latitude'];?>"/></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

</div>
</div>
</body>
</html>
