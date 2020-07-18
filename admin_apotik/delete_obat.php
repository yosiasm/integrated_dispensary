<?php
 

require('../db.php');
include("auth.php");
$id_obat=$_REQUEST['id_obat'];
$query = "DELETE FROM obat WHERE id_obat=$id_obat AND id_apotik_obat=".$_SESSION['id_role_detail_apotik']." ;";
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view_obat.php"); 
?>