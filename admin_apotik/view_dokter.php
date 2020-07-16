<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Dokter Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert_dokter.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Dokter Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<!-- `nama` `alergi_obat` `tanggal_lahir` `berat_badan` `alamat` `longitude` `latitude``kontak_person` -->
<thead>
<tr><th><strong>No</strong></th>
	<th><strong>Nama</strong></th>
	<th><strong>Alergi Obat</strong></th>
	<th><strong>Tanggal Lahir</strong></th>
	<th><strong>Berat Badan</strong></th>
	<th><strong>Alamat</strong></th>
	<th><strong>Kontak</strong></th>
	<th><strong>Longitude</strong></th>
	<th><strong>Latitude</strong></th>
	<th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
// $sel_query="Select * from new_record ORDER BY id desc;";
// $sel_query="SELECT * FROM dokterOnklinik INNER JOIN person on dokterOnklinik.id_dokter=person.id_person WHERE id_klinik=".$_SESSION['id_role_detail_apotik']." ;";

$sel_query="SELECT * FROM dokterOnklinik INNER JOIN credential on dokterOnklinik.id_dokter=credential.id_credential INNER JOIN person on credential.id_person_credential=person.id_person WHERE id_klinik=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["nama"]; ?></td>
	<td align="center"><?php echo $row["alergi_obat"]; ?></td>
	<td align="center"><?php echo $row["tanggal_lahir"]; ?></td>
	<td align="center"><?php echo $row["berat_badan"]; ?></td>
	<td align="center"><?php echo $row["alamat"]; ?></td>
	<td align="center"><?php echo $row["kontak_person"]; ?></td>
	<td align="center"><?php echo $row["longitude"]; ?></td>
	<td align="center"><?php echo $row["latitude"]; ?></td>
	<td align="center"><a href="edit_dokter.php?id_dokter=<?php echo $row["id_dokter"]; ?>">Edit</a></td>
	<td align="center"><a href="delete_dokter.php?id_dokter=<?php echo $row["id_dokter"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
