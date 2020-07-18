<?php
 
 
require('../db.php');
include("auth.php");
?>
<h3>Monitor</h3>
<table width="100%"  style="border-collapse:collapse;">
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
// klinik
$sel_query="SELECT COUNT(id_klinik) FROM `klinik` WHERE 1 ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Klinik</td>
	<td align="center"><?php echo $row["COUNT(id_klinik)"]; ?></td>
</tr>
<?php $count++; } ?>

<?php
// apotik
$sel_query="SELECT COUNT(id_apotik) FROM `apotik` WHERE 1 ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Apotik</td>
	<td align="center"><?php echo $row["COUNT(id_apotik)"]; ?></td>
</tr>
<?php $count++; } ?>

<?php
// dokter
$sel_query="SELECT COUNT(id_role_credential) FROM `credential` WHERE id_role_credential=3 ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Dokter</td>
	<td align="center"><?php echo $row["COUNT(id_role_credential)"]; ?></td>
</tr>
<?php $count++; } ?>

<?php
// kurir
$sel_query="SELECT COUNT(id_role_credential) FROM `credential` WHERE id_role_credential=5 ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Kurir</td>
	<td align="center"><?php echo $row["COUNT(id_role_credential)"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>

