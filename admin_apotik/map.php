<!-- <?php ?> -->
<!-- SELECT * FROM `resep` INNER JOIN `status_pengiriman` ON `resep`.`id_status_resep`=`status_pengiriman`.`id_status` INNER JOIN `person` ON `person`.`id_person`=`resep`.`id_pasien` WHERE `resep`.`id_apotik_resep`=1  -->
<?php
require('../db.php');
include("auth.php");
?>
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
</head>

    <div id="map"></div>
    <script>

<?php
//get apotik location
$sel_query="SELECT * FROM `apotik` WHERE `apotik`.`id_apotik`=".$_SESSION['id_role_detail_apotik'];
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
	$apotik_lat=$row['latitude'];
	$apotik_lon=$row['longitude'];
	$nama_apotik=$row['nama_apotik'];
}


//list data
$sel_query="SELECT * FROM `resep` INNER JOIN `status_pengiriman` ON `resep`.`id_status_resep`=`status_pengiriman`.`id_status` INNER JOIN `person` ON `person`.`id_person`=`resep`.`id_pasien` WHERE `status_pengiriman`.`id_status`< 5 AND `resep`.`id_apotik_resep`=".$_SESSION['id_role_detail_apotik']." ORDER BY `status_pengiriman`.`id_status` DESC";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<?php
		if ($row['id_status'] == 1) { //fokus kelokasi pesanan baru
	    	echo "var map = L.map('map').setView([".$row['latitude'].",".$row['longitude']."], 14);";
		}else {// fokus ke alamat apotik bila tidak ada pesanan baru
    		echo "var map = L.map('map').setView([".$apotik_lat.",".$apotik_lon."], 13);";
    	}
?>	

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

<?php
		echo "L.circleMarker([".$apotik_lat.",".$apotik_lon."] ,{fillOpacity:1,color: 'white',fillColor: 'blue'}   ).addTo(map).bindPopup('Apotik ".$nama_apotik."').openPopup();";
		

		if ($row['id_status'] == 1) { //baru
			$style = ",{fillOpacity:1,color: 'white',fillColor: 'red'}";
		}elseif ($row['id_status'] == 2) {// diterima apotik
			$style = ",{fillOpacity:1,color: 'white',fillColor: 'yellow'}";
		}elseif ($row['id_status'] == 3) {//pengiriman obat
			$style = ",{fillOpacity:1,color: 'white',fillColor: 'green'}";
		}elseif ($row['id_status'] == 4) {//ada yang kosong
			$style = ",{fillOpacity:1,color: 'black',fillColor: 'red'}";
		}
		echo "L.circleMarker([".$row['latitude'].",".$row['longitude']."] ".$style."   ).addTo(map).bindPopup('<a href=\'detail_resep.php?id_resep=".$row['id_resep']."\'>".$row['keterangan']."</a> ').openPopup();";

			

}
?>
		// L.marker([-8.0286951,112.6364449]).addTo(map)
		//   .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
		//   .openPopup();
        
    </script>
