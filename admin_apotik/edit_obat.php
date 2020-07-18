<?php

require('../db.php');
include("auth.php");
$id=$_REQUEST['id_obat'];
// $query = "SELECT * FROM dokterOnklinik INNER JOIN person on dokterOnklinik.id_dokter=person.id_person WHERE id_dokter=".$id." AND id_klinik=".$_SESSION['id_role_detail_apotik'] ;
$query = "SELECT * FROM obat WHERE id_obat=".$id." AND id_apotik_obat=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Obat Record</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert_klinik.php">Insert New Obat</a> | <a href="logout.php">Logout</a></p>
<h1>Update Obat Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$nama_obat = $_REQUEST['nama_obat'];
$stok =  $_REQUEST['stok'];

// $submittedby = $_SESSION["username"];
$update="UPDATE `obat` SET `nama_obat` = '$nama_obat', `stok` = '$stok', `id_apotik_obat` = ".$_SESSION['id_role_detail_apotik']." WHERE `obat`.`id_obat` = $id;";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view_obat.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id_obat'];?>" />

<p><input type="text" name="nama_obat" placeholder="Masukan Nama Obat" required value="<?php echo $row['nama_obat'];?>"/></p>
<p><input type="number" name="stok" placeholder="Masukan Stok" required value="<?php echo $row['stok'];?>"/></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

</div>
</div>
</body>
</html>
