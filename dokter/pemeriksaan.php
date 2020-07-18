<?php
 
 
require('../db.php');
include("auth.php");


$status = "";

if(isset($_POST['simpan_pemeriksaan']) && $_POST['simpan_pemeriksaan']=="update")
{
	$temp_id = uniqid();

	//update detail pasien
	$update="UPDATE `person` SET `nama` = '".$_POST['nama']."', `alergi_obat` = '".$_POST['alergi_obat']."', `tanggal_lahir` = '".$_POST['tanggal_lahir']."', `berat_badan` = '".$_POST['berat_badan']."', `alamat` = '".$_POST['alamat']."', `longitude` = '".$_POST['longitude']."', `latitude` = '".$_POST['latitude']."', `kontak_person` = '".$_POST['kontak_person']."' , `temp_id`='".$temp_id."' WHERE `person`.`id_person` = ".$_POST['id_person'];
	mysqli_query($con, $update) or die(mysqli_error());


	//insert pemeriksaan
	$ins_query="INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `detail_pemeriksaan`, `tanggal_pemeriksaan`, `id_pasien`, `id_dokter`, `tambahan`, `status_pemeriksaan`,`temp_id`) VALUES (NULL, '".$_POST['detail_pemeriksaan']."', now(), '".$_POST['id_person']."', '".$_SESSION['id_role_detail_apotik']."', '', 'Sudah Diperiksa','".$temp_id."');";
	mysqli_query($con,$ins_query) or die(mysql_error());

	//insert resep baru
	$ins_query="INSERT INTO `resep` (`id_resep`, `tanggal_resep`, `keterangan`, `id_pasien`, `id_dokter`, `id_klinik_terkait`, `id_status_resep`, `id_apotik_resep`,`temp_id`) VALUES (NULL, now(), NULL, '".$_POST['id_person']."', '".$_SESSION['id_role_detail_apotik']."', '".$_SESSION['id_klinik_for_resep']."', '1', NULL,'".$temp_id."');";
	mysqli_query($con,$ins_query) or die(mysql_error());
	

	$status = "Record Inserted Successfully. </br></br><a href='buat_resep.php?temp_id=".$temp_id."'>Buat Resep</a>";
	header("Location: buat_resep.php?temp_id=".$temp_id); // Redirect buat resep

}elseif(isset($_POST['simpan_pemeriksaan']) && $_POST['simpan_pemeriksaan']=="insert")
{
	$temp_id = uniqid();

	//insert detail pasien
	$ins_query="INSERT INTO `person` (`id_person`, `nama`, `alergi_obat`, `tanggal_lahir`, `berat_badan`, `alamat`, `longitude`, `latitude`, `kontak_person`, `temp_id`) VALUES (NULL, '".$_POST['nama']."', '".$_POST['alergi_obat']."', '".$_POST['tanggal_lahir']."', '".$_POST['berat_badan']."', '".$_POST['alamat']."', '".$_POST['longitude']."', '".$_POST['latitude']."', '".$_POST['kontak_person']."', '".$temp_id."');";
	mysqli_query($con,$ins_query) or die(mysql_error());
	
	//find id person
	$ins_query="SELECT * FROM person WHERE temp_id='$temp_id'";
	$result = mysqli_query($con,$ins_query);
	while($row = mysqli_fetch_assoc($result)) {
		$id_person = $row['id_person'];
	}

	//insert pemeriksaan
	$ins_query="INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `detail_pemeriksaan`, `tanggal_pemeriksaan`, `id_pasien`, `id_dokter`, `tambahan`, `status_pemeriksaan`,`temp_id`) VALUES (NULL, '".$_POST['detail_pemeriksaan']."', now(), '".$id_person."', '".$_SESSION['id_role_detail_apotik']."', '', 'Sudah Diperiksa','".$temp_id."');";
	mysqli_query($con,$ins_query) or die(mysql_error());

	//insert resep baru
	$ins_query="INSERT INTO `resep` (`id_resep`, `tanggal_resep`, `keterangan`, `id_pasien`, `id_dokter`, `id_klinik_terkait`, `id_status_resep`, `id_apotik_resep`,`temp_id`) VALUES (NULL, now(), NULL, '".$id_person."', '".$_SESSION['id_role_detail_apotik']."', '".$_SESSION['id_klinik_for_resep']."', '1', NULL,'".$temp_id."');";
	echo "$ins_query";
	mysqli_query($con,$ins_query) or die(mysql_error());


	$status = "Record Inserted Successfully. </br></br><a href='buat_resep.php?temp_id=".$temp_id."'>Buat Resep</a>";
	header("Location: buat_resep.php?temp_id=".$temp_id); // Redirect buat resep

}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Resep Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></p>
	<form name="form" method="post" action=""> 
	<input type="hidden" name="cari_pasien" value="1" />

	<table>
		<tr>
			<td><input name="search" type="text" placeholder="Cari Nama Pasien" /></td>
			<td><input name="submit" type="submit" value="Cari" /></td>
		</tr>
	</table>
</form>

<!-- ##################################### start jika melakukan pencarian -->
<?php
if(isset($_POST['cari_pasien']) && $_POST['cari_pasien']==1)
{
	$search = $_POST['search'];
	$setting_enabel_groupby_query="SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
	mysqli_query($con,$setting_enabel_groupby_query);

	$sel_query="SELECT * FROM `pemeriksaan` INNER JOIN person ON pemeriksaan.id_pasien=person.id_person WHERE person.nama LIKE '%".$search."%' AND pemeriksaan.id_dokter=".$_SESSION['id_role_detail_apotik']." GROUP BY pemeriksaan.id_pasien";
	$result = mysqli_query($con,$sel_query);
	if (mysqli_num_rows($result)>0) { 
		echo '<table width="100%" border="1" style="border-collapse:collapse;">
			<thead>
			<tr><th><strong>No</strong></th>
				<th><strong>Nama</strong></th>
				<th><strong>Tanggal Lahir</strong></th>
				<th><strong>Tanggal Pemeriksaan</strong></th>
				<th><strong>Action</strong></th>
			</tr>
			</thead>
			<tbody>
			';
		$c=1;
		while($row = mysqli_fetch_assoc($result)) { 
			echo "<tr><td>".$c."</td>
			<td>".$row['nama']."</td><td>".$row['tanggal_lahir']."</td><td>".$row['tanggal_pemeriksaan']."</td><td><a href='pemeriksaan.php?id_pasien=".$row['id_pasien']."'>periksa</a></td>
			</tr>";
			$c++;
		}
		echo "</tbody></table>";
	}else {
		echo "Not Found";
	}
	

}
?>
</div>
<!-- ##################################### end jika melakukan pencarian -->


<div class="form">

<h2>Pasien Records</h2>

<?php

$id_pasien=isset($_REQUEST['id_pasien']) ? $_REQUEST['id_pasien'] : 'no_data';
// ######################################### menggunakan data di database
if($id_pasien != 'no_data'){
	// $sel_query="SELECT * FROM `person` INNER JOIN pemeriksaan on pemeriksaan.id_pasien=person.id_person WHERE id_person=".$_REQUEST['id_pasien']." ORDER BY pemeriksaan.tanggal_pemeriksaan DESC LIMIT 1";
	$sel_query="SELECT * FROM `person` WHERE id_person=".$_REQUEST['id_pasien'];

	$result = mysqli_query($con,$sel_query);
	while($row = mysqli_fetch_assoc($result)) { ?>

<div>
<form name="form" method="post" action="pemeriksaan.php"> 
<input type="hidden" name="insert_periksa" value="1" />
<input name="id_person" type="hidden" value="<?php echo $row['id_person'];?>" />
<input type="hidden" name="simpan_pemeriksaan" value="update" />


<p><input type="text" name="nama" placeholder="Masukan nama" required value="<?php echo $row['nama'];?>"/></p>
<p><input type="text" name="alergi_obat" placeholder="Masukan Keterangan Alergi Obat" required value="<?php echo $row['alergi_obat'];?>"/></p>
<p><input type="date" name="tanggal_lahir" required value="<?php echo $row['tanggal_lahir'];?>"/></p>
<p><input type="number" name="berat_badan" required value="<?php echo $row['berat_badan'];?>"/></p>
<p><input type="text" name="alamat" placeholder="Masukan Alamat" required value="<?php echo $row['alamat'];?>"/></p>
<p><input type="text" name="kontak_person" placeholder="Masukan Nomor Telp" required value="<?php echo $row['kontak_person'];?>"/></p>
<p><input type="number" step="any" name="longitude" required value="<?php echo $row['longitude'];?>"/></p>
<p><input type="number" step="any" name="latitude" required value="<?php echo $row['latitude'];?>"/></p>
<p><textarea name="detail_pemeriksaan" rows="4" cols="50">Detail Pemeriksaan</textarea></p>
<p><input name="submit" type="submit" value="Simpan Dan Buat Resep" /></p>
</form>


<?php }} ?> 
<?php if($id_pasien == 'no_data') { ?>
	<!-- ########################################### jika pemeriksaan baru -->
<form name="form" method="post" action="pemeriksaan.php"> 
<input type="hidden" name="insert_periksa" value="1" />
<input type="hidden" name="new" value="1" />
<input type="hidden" name="simpan_pemeriksaan" value="insert" />


<p><input type="text" name="nama" placeholder="Masukan nama" required /></p>
<p><input type="text" name="alergi_obat" placeholder="Masukan Keterangan Alergi Obat" required /></p>
<p><input type="date" name="tanggal_lahir" required /></p>
<p><input type="number" name="berat_badan" required placeholder="Masukan Berat Badan" /></p>
<p><input type="text" name="alamat" placeholder="Masukan Alamat" required /></p>
<p><input type="text" name="kontak_person" placeholder="Masukan Nomor Telp" required /></p>
<p><input type="number" step="any" name="longitude" required placeholder="Masukan longitude" /></p>
<p><input type="number" step="any" name="latitude" required placeholder="Masukan latitude" /></p>
<p><textarea name="detail_pemeriksaan" rows="4" cols="50">Detail Pemeriksaan</textarea></p>
<p><input name="submit" type="submit" value="Simpan Dan Buat Resep" /></p>
</form>
<?php } ?>

</div>







</div>
</body>
</html>
