<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
?>

<?php
session_start();
if(!isset($_SESSION["username_apotik"]) && !isset($_SESSION["jenis_role_apotik"]) ){
	if(!$_SESSION['jenis_role_apotik'] == 'Super Admin'){
			header("Location: ../login.php");
			exit();
	}
}
?>
