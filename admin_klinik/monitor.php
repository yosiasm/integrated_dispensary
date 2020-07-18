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
// dokter
$sel_query="SELECT COUNT(id_dokterOnklinik) FROM `dokterOnklinik` WHERE id_klinik=".$_SESSION['id_role_detail_apotik'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center">Dokter</td>
	<td align="center"><?php echo $row["COUNT(id_dokterOnklinik)"]; ?></td>
</tr>
<?php $count++; } ?>


</tbody>
</table>

