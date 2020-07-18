<?php 
  header("Content-Type: application/json; charset=UTF-8");
  require('../db.php');
  include("auth.php");
  
  if(isset($_GET["query"])){
    $key = "%".$_GET["query"]."%";
    $query = "SELECT * FROM obat WHERE nama_obat LIKE ? LIMIT 10";
    $dewan1 = $con->prepare($query);
    $dewan1->bind_param('s', $key);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
 
    while ($row = $res1->fetch_assoc()) {
        $output['suggestions'][] = [
            'value' => $row['nama_obat'],
            'id_obat'  => $row['id_obat'],
            'nama'  => $row['nama_obat']
        ];
    }
 
    if (! empty($output)) {
        echo json_encode($output);
    }
  }
?>