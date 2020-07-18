<?php 
  header("Content-Type: application/json; charset=UTF-8");
  require('../db.php');
  include("auth.php");
  
  if(isset($_GET["query"])){
    $key = "%".$_GET["query"]."%";
    $query = "SELECT * FROM apotik WHERE nama_apotik LIKE ? LIMIT 10";
    $dewan1 = $con->prepare($query);
    $dewan1->bind_param('s', $key);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
 
    while ($row = $res1->fetch_assoc()) {
        $output['suggestions'][] = [
            'value' => $row['nama_apotik'],
            'id_apotik'  => $row['id_apotik'],
            'nama'  => $row['nama_apotik']
        ];
    }
 
    if (! empty($output)) {
        echo json_encode($output);
    }
  }
?>