<!-- <?php ?> -->
<!-- SELECT * FROM `resep` INNER JOIN `status_pengiriman` ON `resep`.`id_status_resep`=`status_pengiriman`.`id_status` INNER JOIN `person` ON `person`.`id_person`=`resep`.`id_pasien` WHERE `resep`.`id_apotik_resep`=1  -->
<?php
require('../db.php');
include("auth.php");

//get apotik location
$sel_query="SELECT * FROM `apotik` WHERE `apotik`.`id_apotik`=".$_SESSION['id_apotik_for_map'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
	$apotik_lat=$row['latitude'];
	$apotik_lon=$row['longitude'];
	$nama_apotik=$row['nama_apotik'];
}

//list data
$sel_query="SELECT * FROM `resep` INNER JOIN `status_pengiriman` ON `resep`.`id_status_resep`=`status_pengiriman`.`id_status` INNER JOIN `person` ON `person`.`id_person`=`resep`.`id_pasien` WHERE `status_pengiriman`.`id_status`< 5 AND `resep`.`id_apotik_resep`=".$_SESSION['id_apotik_for_map']." ORDER BY `status_pengiriman`.`id_status` DESC";
$result = mysqli_query($con,$sel_query);
?>
<h3>Tasks</h3><table><tr><th><strong>Nama</strong></th><th><strong>Alamat</strong></th><th><strong>Status</strong></th></tr>
<?php
while($row = mysqli_fetch_assoc($result)) { 
	echo "<tr><td>".$row['nama']."</td><td>".$row['alamat']."</td><td>";
		if ($row['id_status'] == 3) {// menunggu kurir
			echo "<a href='set_status_pengiriman.php?id_resep=".$row['id_resep']."&longitude=".$row['longitude']."&latitude=".$row['latitude']."'>".$row['keterangan']."</a>";
		}elseif ($row['id_status'] == 4) {//pengiriman obat
			echo "<a href='set_status_pengiriman.php?id_resep=".$row['id_resep']."&longitude=".$row['longitude']."&latitude=".$row['latitude']."&navigasi=1'>".$row['keterangan']."</a>";
		}
	echo "</td></tr>";
		

			

}?>
</table><br/>
		
        
