<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('../db.php');
include("auth.php");


$status = "";
if(isset($_POST['checkout']) && $_POST['checkout']==1)
{
	$id_resep=$_REQUEST['id_resep'];

	$sel_query="SELECT * FROM `detail_resep` INNER JOIN obat ON obat.id_obat=detail_resep.id_obat_ INNER JOIN resep on resep.id_resep=detail_resep.id_resep_ WHERE resep.id_status_resep < 3 AND detail_resep.id_resep_=".$id_resep;

	$result = mysqli_query($con,$sel_query);
	while($row = mysqli_fetch_assoc($result)) { 
		//update stok
		$update="UPDATE `obat` SET `stok` = `stok` - ".$row['jumlah']." WHERE `obat`.`id_obat` = ".$row['id_obat_'];
		mysqli_query($con, $update) or die(mysqli_error());
	}
	//update jadi menunggu kurir
	$update="UPDATE `resep` SET `id_status_resep` = '3' WHERE `resep`.`id_resep` =".$id_resep;
	mysqli_query($con, $update) or die(mysqli_error());

	$status = "Record Updated Successfully. </br></br><a href='view_resep.php'>View Resep Record</a>";
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Resep Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></p>
<h2>View Resep Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<!-- `nama` `alergi_obat` `tanggal_lahir` `berat_badan` `alamat` `longitude` `latitude``kontak_person` -->
<thead>
<tr><th><strong>ID Resep</strong></th>
	<th><strong>Tanggal</strong></th>
	<th><strong>Status</strong></th>
	<th><strong>Nama Dokter</strong></th>
	<th><strong>Nama Klinik</strong></th>
	<th><strong>Kontak Klinik</strong></th>
	<th><strong>Alamat Klinik</strong></th>
	<th><strong>Keterangan</strong></th>
</tr>
</thead>
<tbody>
<?php
$id_resep=$_REQUEST['id_resep'];

$sel_query="SELECT id_resep,tanggal_resep,`status_pengiriman`.`keterangan` as status,`resep`.`keterangan`,`person`.`nama` AS nama_dokter ,nama_klinik ,alamat_klinik ,kontak_klinik FROM `resep` INNER JOIN `credential` ON `resep`.`id_dokter`=`credential`.`id_credential` INNER JOIN `person` ON `person`.`id_person`=`credential`.`id_person_credential` INNER JOIN `klinik` ON `klinik`.`id_klinik`=`resep`.`id_klinik_terkait` INNER JOIN `status_pengiriman` ON `status_pengiriman`.`id_status`=`resep`.`id_status_resep` WHERE `id_apotik_resep`=".$_SESSION['id_role_detail_apotik']." ;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $row["id_resep"]; ?></td>
	<td align="center"><?php echo $row["tanggal_resep"]; ?></td>
	<td align="center"><?php echo $row["status"]; ?></td>
	<td align="center"><?php echo $row["nama_dokter"]; ?></td>
	<td align="center"><?php echo $row["nama_klinik"]; ?></td>
	<td align="center"><?php echo $row["kontak_klinik"]; ?></td>
	<td align="center"><?php echo $row["alamat_klinik"]; ?></td>
	<td align="center"><?php echo $row["keterangan"]; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<h2>Detail Obat</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<!-- `nama` `alergi_obat` `tanggal_lahir` `berat_badan` `alamat` `longitude` `latitude``kontak_person` -->
<thead>
<tr><th><strong>No</strong></th>
	<th><strong>Nama Obat</strong></th>
	<th><strong>Stok</strong></th>
	<th><strong>Pesanan</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$id_resep=$_REQUEST['id_resep'];


$sel_query="SELECT id_obat_ ,`obat`.`nama_obat`,`obat`.`stok`,`detail_resep`.`jumlah` FROM `detail_resep` INNER JOIN `resep` ON `detail_resep`.`id_resep_`=`resep`.`id_resep` INNER JOIN `obat` ON `obat`.`id_obat`=`detail_resep`.`id_obat_` WHERE `detail_resep`.`id_resep_`=".$id_resep." AND `resep`.`id_apotik_resep`=".$_SESSION['id_role_detail_apotik']." ;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["nama_obat"]; ?>
	<td align="center"><?php echo $row["stok"]; ?></td>
	<td align="center"><?php echo $row["jumlah"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="checkout" value="1" />

<p><input name="submit" type="submit" value="Checkout" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>

</div>
</body>
</html>
