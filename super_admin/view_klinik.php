<?php
 
 
require('../db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Klinik Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert_klinik.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Klinik Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th>
	<th><strong>Nama Klinik</strong></th>
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
$sel_query="SELECT * FROM `klinik` WHERE 1 ORDER BY nama_klinik asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["nama_klinik"]; ?></td>
	<td align="center"><?php echo $row["alamat_klinik"]; ?></td>
	<td align="center"><?php echo $row["kontak_klinik"]; ?></td>
	<td align="center"><?php echo $row["longitude"]; ?></td>
	<td align="center"><?php echo $row["latitude"]; ?></td>
	<td align="center"><a href="edit_klinik.php?id_klinik=<?php echo $row["id_klinik"]; ?>">Edit</a></td>
	<td align="center"><a href="delete_klinik.php?id_klinik=<?php echo $row["id_klinik"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
