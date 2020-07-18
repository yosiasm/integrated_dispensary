<?php
 
 
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Resep Records</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></p>
<h2>View Resep Records</h2>
<table width="100%"  style="border-collapse:collapse;">
<!-- `nama` `alergi_obat` `tanggal_lahir` `berat_badan` `alamat` `longitude` `latitude``kontak_person` -->
<thead class="tbl-header">
<tr><th><strong>No</strong></th>
	<th><strong>Tanggal</strong></th>
	<th><strong>Status</strong></th>
	<th><strong>Keterangan</strong></th>
	<th><strong>Nama Klinik</strong></th>
	<th><strong>Nama Dokter</strong></th>
	<th><strong>Action</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
// $sel_query="Select * from new_record ORDER BY id desc;";
// $sel_query="SELECT * FROM dokterOnklinik INNER JOIN person on dokterOnklinik.id_dokter=person.id_person WHERE id_klinik=".$_SESSION['id_role_detail_apotik']." ;";

// $sel_query="SELECT * FROM kurirOnApotik INNER JOIN credential on kurirOnApotik.id_kurir=credential.id_credential INNER JOIN person on credential.id_person_credential=person.id_person WHERE id_apotik=".$_SESSION['id_role_detail_apotik']." ;";
$sel_query="SELECT id_resep,tanggal_resep,`status_pengiriman`.`keterangan` as status,`resep`.`keterangan`,`person`.`nama` AS nama_dokter ,nama_klinik FROM `resep` INNER JOIN `credential` ON `resep`.`id_dokter`=`credential`.`id_credential` INNER JOIN `person` ON `person`.`id_person`=`credential`.`id_person_credential` INNER JOIN `klinik` ON `klinik`.`id_klinik`=`resep`.`id_klinik_terkait` INNER JOIN `status_pengiriman` ON `status_pengiriman`.`id_status`=`resep`.`id_status_resep` WHERE `id_apotik_resep`=".$_SESSION['id_role_detail_apotik']." ;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["tanggal_resep"]; ?></td>
	<td align="center"><?php echo $row["status"]; ?></td>
	<td align="center"><?php echo $row["keterangan"]; ?></td>
	<td align="center"><?php echo $row["nama_klinik"]; ?></td>
	<td align="center"><?php echo $row["nama_dokter"]; ?></td>
	<td align="center"><a href="detail_resep.php?id_resep=<?php echo $row["id_resep"]; ?>">Detail</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
