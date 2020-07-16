<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('../db.php');
$id_klinik=$_REQUEST['id_klinik'];
$query = "DELETE FROM klinik WHERE id_klinik=$id_klinik"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_klinik.php"); 
?>