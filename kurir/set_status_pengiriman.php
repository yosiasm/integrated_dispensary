<h3>Map</h3>
<head>
   <meta charset="utf-8">
   <!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" /> -->
   <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">

   <!-- <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> -->
   <script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>
   <style>
       #map{ height: 500px }

   </style>
   <link rel="stylesheet" href="../css/table.css" />
</head>
<?php
require('../db.php');
include("auth.php");

if (isset($_POST['change_status']) && $_POST['change_status']==4) {
	$update="UPDATE `resep` SET `id_status_resep` = '4' WHERE `resep`.`id_resep` = ".$_POST['id_resep'];
	mysqli_query($con, $update) or die(mysqli_error());
	header("Location: dashboard.php"); // Redirect user to index.php
	
}elseif (isset($_POST['change_status']) && $_POST['change_status']==5) {
	$update="UPDATE `resep` SET `id_status_resep` = '5' WHERE `resep`.`id_resep` = ".$_POST['id_resep'];
	mysqli_query($con, $update) or die(mysqli_error());
	header("Location: dashboard.php"); // Redirect user to index.php

}

$id_resep = $_REQUEST['id_resep'];
$longitude = $_REQUEST['longitude'];
$latitude = $_REQUEST['latitude'];

$sel_query="SELECT * FROM `resep` INNER JOIN person ON resep.id_pasien=person.id_person WHERE resep.id_resep=".$id_resep;
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
		$id_status_resep = $row['id_status_resep'];

	?>

	<strong>Detail Alamat</strong>
	<table>
		<tr>
			<td>Alamat</td>
			<td><?php echo $row['alamat']; ?></td>
		</tr>
		<tr>
			<td>Kontak</td>
			<td><?php echo $row['kontak_person']; ?></td>
		</tr>
	</table>
	<form action=<?php echo "https://www.google.com/maps/@$latitude,$longitude,15z" ?> >
		<input type="submit" name="" value="map">
		
	</form>

	<?php if($id_status_resep<4){ 
		echo '	<form method="post" action="" >
			<input type="hidden" name="change_status" value="4">
			<input type="hidden" name="id_resep" value="'.$id_resep.'">
			<input type="submit" name="" value="Kirim">
			
		</form>';
		}elseif ($id_status_resep<5) {
			echo '	<form method="post" action="" >
			<input type="hidden" name="change_status" value="5">
			<input type="hidden" name="id_resep" value="'.$id_resep.'">
			<input type="submit" name="" value="Selesai">
			
		</form>';
		}
	?>


<?php }
?>

<div id="map"></div>
    <script>
		
		var map = L.map('map').setView([<?php echo "$latitude,$longitude"; ?>], 13);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);
		L.circleMarker([<?php echo "$latitude,$longitude"; ?>] ,{fillOpacity:1,color: 'white',fillColor: 'blue'}   ).addTo(map).bindPopup('Tujuan').openPopup();

		
        
    </script>

