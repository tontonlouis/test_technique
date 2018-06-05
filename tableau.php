<?php
$conn = new mysqli('127.0.0.1','root','', 'test_technique');

$idRuche = $_POST['idRuche'];

if(!isset($idRuche)){
  echo $idRuche;
}else {
  $sql=$conn->query("SELECT * FROM etat where idruche = $idRuche");
  $data=[];
$data= mysqli_fetch_all($sql, MYSQLI_ASSOC);

    echo json_encode($data);
}
 ?>
