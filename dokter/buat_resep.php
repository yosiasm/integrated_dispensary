<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.7/jquery.autocomplete.min.js"></script>
	<title></title>
<style>
   .autocomplete-suggestions {
       border: 1px solid #999;
       background: #FFF;
       overflow: auto;
   }
   .autocomplete-suggestion {
       padding: 2px 5px;
       white-space: nowrap;
       overflow: hidden;
   }
   .autocomplete-selected {
       background: #F0F0F0;
   }
   .autocomplete-suggestions strong {
       font-weight: normal;
       color: #3399FF;
   }
   .autocomplete-group {
       padding: 2px 5px;
   }
   .autocomplete-group strong {
       display: block;
       border-bottom: 1px solid #000;
   }
   input {
	    width: 100%; /* force to expand to container's width */ 
	    border: 7px solid #DFDFDF;  
	    padding: 10 10px;
	    /*margin: 0 -17px;  negative margin = border-width + horizontal padding  */
	}  
</style>
</head>
<body>





<?php
require('../db.php');
include("auth.php");
	$id_resep='';
	if (isset($_POST['tambah_obat']) && $_POST['tambah_obat']==1) {
		//insert detail resep
		$ins_query="INSERT INTO `detail_resep` (`id_detail_resep`, `id_resep_`, `id_obat_`, `jumlah`, `keterangan`) VALUES (NULL, '".$_POST['id_resep']."', '".$_POST['id_obat']."', '".$_POST['jumlah']."', '".$_POST['keterangan']."');";
		mysqli_query($con,$ins_query) or die(mysql_error());

		
		
	}
	if (isset($_REQUEST['temp_id'])) {
		$temp_id = $_REQUEST['temp_id'];

		//find id resep
		$ins_query="SELECT * FROM resep WHERE temp_id='$temp_id'";
		$result = mysqli_query($con,$ins_query);
		while($row = mysqli_fetch_assoc($result)) {
			$id_resep = $row['id_resep'];

		}

	}elseif (isset($_REQUEST['id_resep'])) {
		$id_resep = $_REQUEST['id_resep'];
	}
	$ins_query="UPDATE `resep` SET `id_apotik_resep` = '".$_POST['id_apotik']."' WHERE `resep`.`id_resep` = '".$id_resep."'";
		mysqli_query($con,$ins_query) or die(mysql_error());
?>
<br/>
<center><strong>Tambah Obat</strong></center>
<center><div style="display: inline-block;position: relative;">

        
	<form name="form" method="post" action="">
	
		<input type="hidden" name="id_resep" value="<?php echo $id_resep ?>">
		<input type="hidden" name="tambah_obat" value="1">
				<input type="text" name="apotik" id="apotik" class="form-control" placeholder="Tulis Nama Apotik" /> 
				<input type="hidden" name="id_apotik" id="id_apotik" class="form-control" /> 
				<input type="text" name="obat" id="obat" class="form-control" placeholder="Tulis Nama obat" /> 
				<input type="hidden" name="id_obat" id="id_obat" class="form-control" /> 
				<p><input type="number" name="jumlah" placeholder="Jumlah Obat"></p>
				<p><input type="text" name="keterangan" placeholder="Keterangan"></p>

			<td><input type="submit" name="submit" value="tambahkan"></td>
	</form>
</div></center>
<br/>
<center><strong>Daftar Obat</strong></center>
<center><div style="display: inline-block;position: relative;">
	<table>
	<thead class="tbl-header">
		<tr><th><strong>No.</strong></th>
			<th><strong>Nama Obat</strong></th>
			<th><strong>Jumlah</strong></th>
			<th><strong>Keterangan</strong></th>
		</tr>
	</thead>
	<tbody>

<?php

	$ins_query="SELECT * FROM detail_resep INNER JOIN obat on detail_resep.id_obat_=obat.id_obat WHERE id_resep_='$id_resep'";
	$result = mysqli_query($con,$ins_query);
	$count=1;
	while($row = mysqli_fetch_assoc($result)) {
?>
		<tr><td><?php echo $count; ?></td>
			<td><?php echo $row['nama_obat']; ?></td>
			<td><?php echo $row['jumlah']; ?></td>
			<td><?php echo $row['keterangan']; ?></td>
		</tr>
<?php
	}
?>

	</tbody>
</table>
<form action="dashboard.php">
	<input type="submit" value="Selesai">
</form>
</div></center>



<script type="text/javascript">
      $(document).ready(function() {
        $( "#obat" ).autocomplete({
          serviceUrl: "search_obat.php",   // Kode php untuk prosesing data
          dataType: "JSON",           // Tipe data JSON
          onSelect: function (suggestion) {
              $( "#obat" ).val(suggestion.nama);
              $( "#id_obat" ).val(suggestion.id_obat);
          }
        });
      })
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $( "#apotik" ).autocomplete({
          serviceUrl: "search_apotik.php",   // Kode php untuk prosesing data
          dataType: "JSON",           // Tipe data JSON
          onSelect: function (suggestion) {
              $( "#apotik" ).val(suggestion.nama);
              $( "#id_apotik" ).val(suggestion.id_apotik);
          }
        });
      })
  </script>
</body>
</html>