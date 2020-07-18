<?php
 

require('../db.php');
$id_apotik=$_REQUEST['id_apotik'];
$query = "DELETE FROM apotik WHERE id_apotik=$id_apotik"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_apotik.php"); 
?>