<?php
 

require('../db.php');
include("auth.php");
$id_kurir=$_REQUEST['id_kurir'];
$query = "DELETE FROM kurirOnApotik WHERE id_kurir=$id_kurir AND id_apotik=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view_kurir.php"); 
?>