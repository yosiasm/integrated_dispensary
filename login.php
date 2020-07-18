<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        //$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
        $query = "SELECT * FROM `credential` INNER JOIN role on credential.id_role_credential = role.id_role WHERE username = '$username' and password='$password' ";
        
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username_apotik'] = $username;
			// $_SESSION['role_apotik'] = 
			echo "berhasil";
			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['jenis_role_apotik'] = $row['jenis_role'];
				$id_person_credential = $row['id_person_credential'];
			}
			echo $_SESSION['jenis_role_apotik'];
			if($_SESSION['jenis_role_apotik'] == 'Super Admin'){
				header("Location: super_admin/index.php"); // Redirect user to index.php


			}elseif ($_SESSION['jenis_role_apotik'] == 'Admin Klinik') {
				$q = "SELECT * FROM `adminOnklinik` WHERE id_admin_klinik = '$id_person_credential'";
				echo $q;
				$res = mysqli_query($con,$q) or die(mysqli_error());
		  		$r = mysqli_num_rows($res);
		  		if($r==1){
		  			while($r = mysqli_fetch_assoc($res)) {
		  				$_SESSION['id_role_detail_apotik'] = $r['id_klinik'];

					}
		  		}

				header("Location: admin_klinik/index.php"); // Redirect user to index.php
				
			}elseif ($_SESSION['jenis_role_apotik'] == 'Admin Apotik') {
				$q = "SELECT * FROM `adminOnApotik` WHERE id_admin_apotik = '$id_person_credential'";
				echo $q;
				$res = mysqli_query($con,$q) or die(mysqli_error());
		  		$r = mysqli_num_rows($res);
		  		if($r==1){
		  			while($r = mysqli_fetch_assoc($res)) {
		  				$_SESSION['id_role_detail_apotik'] = $r['id_apotik'];

					}
		  		}

				header("Location: admin_apotik/index.php"); // Redirect user to index.php
				
			}elseif ($_SESSION['jenis_role_apotik'] == 'Dokter') {
				$q = "SELECT * FROM `dokterOnklinik` WHERE id_dokter = '$id_person_credential'";
				echo $q;
				$res = mysqli_query($con,$q) or die(mysqli_error());
		  		$r = mysqli_num_rows($res);
		  		if($r==1){
		  			while($r = mysqli_fetch_assoc($res)) {
		  				$_SESSION['id_role_detail_apotik'] = $r['id_dokter'];
		  				$_SESSION['id_klinik_for_resep'] = $r['id_klinik'];

					}
		  		}

				header("Location: dokter/index.php"); // Redirect user to index.php
				
			}


        }else{
			echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
		}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>


</div>
<?php } ?>


</body>
</html>
