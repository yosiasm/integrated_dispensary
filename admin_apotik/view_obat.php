<?php

require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Obat Records</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert_obat.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Obat Records</h2>
<table width="100%"  style="border-collapse:collapse;">
<!-- `nama` `alergi_obat` `tanggal_lahir` `berat_badan` `alamat` `longitude` `latitude``kontak_person` -->
<thead class="tbl-header">
<tr><th><strong>No</strong></th>
	<th><strong>Nama Obat</strong></th>
	<th><strong>Stok Obat</strong></th>
	<th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
// $sel_query="Select * from new_record ORDER BY id desc;";
// $sel_query="SELECT * FROM dokterOnklinik INNER JOIN person on dokterOnklinik.id_dokter=person.id_person WHERE id_klinik=".$_SESSION['id_role_detail_apotik']." ;";

$sel_query="SELECT * FROM obat WHERE id_apotik_obat=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["nama_obat"]; ?></td>
	<td align="center"><?php echo $row["stok"]; ?></td>
	<td align="center"><a href="edit_obat.php?id_obat=<?php echo $row["id_obat"]; ?>">Edit</a></td>
	<td align="center"><a href="delete_obat.php?id_obat=<?php echo $row["id_obat"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
