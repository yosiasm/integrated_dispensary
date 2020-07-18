<?php
 
 
require('../db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
// change to this folder role code
$role_code = '4';
$trn_date = date("Y-m-d H:i:s");

$nama_obat = $_REQUEST['nama_obat'];
$stok = $_REQUEST['stok'];

// insert to obat
$ins_query="INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `id_apotik_obat`) VALUES (NULL, '$nama_obat', '$stok','".$_SESSION['id_role_detail_apotik']."');";
mysqli_query($con,$ins_query) or die(mysql_error());


$status = "New Record Inserted Successfully.</br></br><a href='view_obat.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Obat</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view_obat.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Insert New Obat</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="nama_obat" placeholder="Masukan Nama Obat" required /></p>
<p><input type="text" name="stok" placeholder="Masukan Stok" required /></p>



<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>
</div>
</body>
</html>
