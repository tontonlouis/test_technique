<?php
//db connection
$conn = new mysqli('127.0.0.1','root','', 'test_technique');

//query
$sql=$conn->query("SELECT * FROM etat");
$tableau = '<tbody>';
while($trs=mysqli_fetch_array($sql)){
  $tableau .='<tr>';
      $tableau.='<td></td>';
      $tableau.='<td>'.$trs['dateEtat'].'</td>';
      $tableau.='<td>'.$trs['Poids'].'</td>';
      $tableau.='<td>'.$trs['Temperature'].'</td>';
      $tableau.='<td>'.$trs['Humidite'].'</td>';
      $tableau.='<td>'.$trs['idRuche'].'</td>';
  $tableau.='</tr>';
  }
  $tableau.='</tbody>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Ruches</h4>

  <div class="btn-group">




  </div>

</div>
<br>
    </div>

    <div class="col-sm-9">
        <table class='table table-bordered'>
          <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Date</th>
                <th scope="col">Poids</th>
                <th scope="col">Temperature</th>
                <th scope="col">Humidité</th>
                <th scope="col">IdRuche</th>
              </tr>
          </thead>
          <?php echo $tableau ?>
        </table>
</div>
</html>
