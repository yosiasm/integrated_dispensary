<?php
 
 
require('../db.php');
include("auth.php");
?>
<head><link rel="stylesheet" href="../css/table.css" /></head>
<h3>Monitor</h3>
<table class="rwd-table" width="100%"  style="border-collapse:collapse;">
<thead class="tbl-header">
<tr>
	<th><strong>No</strong></th>
	<th><strong>Field</strong></th>
	<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
// kurir
$sel_query="SELECT COUNT(id_kurirOnApotik) FROM `kurirOnApotik` WHERE id_apotik=".$_SESSION['id_role_detail_apotik'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Kurir</td>
	<td align="center"><?php echo $row["COUNT(id_kurirOnApotik)"]; ?></td>
</tr>
<?php $count++; } ?>


<?php
// jenis obat
$sel_query="SELECT COUNT(id_obat) FROM `obat` WHERE id_apotik_obat=".$_SESSION['id_role_detail_apotik'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Jenis Obat</td>
	<td align="center"><?php echo $row["COUNT(id_obat)"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>

