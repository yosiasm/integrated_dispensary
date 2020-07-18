<?php
 
 
require('../db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
</head>
<body>
<div class="form">
<p>Welcome to Dashboard.</p>
<?php include("map.php"); ?>
<?php include("monitor.php");?>
<h3>Action</h3>
<p><a href="index.php">Home</a><p>
<!-- <p><a href="insert.php">Insert New Record</a></p> -->
<!-- <p><a href="view.php">View Records</a><p> -->

<p><a href="view_resep.php">View Resep Records</a><p>
<p><a href="insert_obat.php">Insert Obat Records</a><p>
<p><a href="view_obat.php">View Obat Records</a><p>
<p><a href="insert_kurir.php">Insert Kurir Records</a><p>
<p><a href="view_kurir.php">View Kurir Records</a><p>

<p><a href="logout.php">Logout</a></p>


</div>
</body>
</html>
