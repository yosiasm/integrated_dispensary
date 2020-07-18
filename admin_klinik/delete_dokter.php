<?php
 

require('../db.php');
include("auth.php");
$id_dokter=$_REQUEST['id_dokter'];
$query = "DELETE FROM dokterOnklinik WHERE id_dokter=$id_dokter AND id_klinik=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view_dokter.php"); 
?>