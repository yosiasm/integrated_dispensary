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
<body class="card text-center">
<div class="form">
<p>Welcome to Dashboard.</p>
<?php include("monitor.php"); ?>
<h3>Action</h3>
<p><a href="index.php">Home</a><p>
<!-- <p><a href="insert.php">Insert New Record</a></p> -->
<!-- <p><a href="view.php">View Records</a><p> -->

<p><a href="insert_dokter.php">Insert Dokter Records</a><p>
<p><a href="view_dokter.php">View dokter Records</a><p>
<p><a href="logout.php">Logout</a></p>


</div>
</body>
</html>
