<?php
 
 
require('../db.php');
include("auth.php");
?>
<h3>Monitor</h3>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
	<th><strong>No</strong></th>
	<th><strong>Field</strong></th>
	<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
// pemeriksaan
$sel_query="SELECT COUNT(id_pemeriksaan) FROM `pemeriksaan` WHERE id_dokter=".$_SESSION['id_role_detail_apotik'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Pemeriksaan</td>
	<td align="center"><?php echo $row["COUNT(id_pemeriksaan)"]; ?></td>
</tr>
<?php $count++; } ?>


</tbody>
</table>

