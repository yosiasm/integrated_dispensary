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
<title>View Apotik Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Apotik Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th>
	<th><strong>Nama Apotik</strong></th>
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
$sel_query="SELECT * FROM `apotik` WHERE 1 ORDER BY nama_apotik asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["nama_apotik"]; ?></td>
	<td align="center"><?php echo $row["alamat_apotik"]; ?></td>
	<td align="center"><?php echo $row["kontak_apotik"]; ?></td>
	<td align="center"><?php echo $row["longitude"]; ?></td>
	<td align="center"><?php echo $row["latitude"]; ?></td>
	<td align="center"><a href="edit.php?id=<?php echo $row["id_apotik"]; ?>">Edit</a></td>
	<td align="center"><a href="delete.php?id=<?php echo $row["id_apotik"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
