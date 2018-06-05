<?php
//db connection
$conn = new mysqli('127.0.0.1','root','', 'test_technique');

//query
$query=$conn->query("SELECT idRuche, nomRuche FROM ruche");
$select = '<select id="ruches">';
while($rs=mysqli_fetch_array($query)){
  $select.='<option value='. $rs["idRuche"].'>' . $rs["nomRuche"] . '</option>';

  }
  $select.='</select>';


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

</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Ruches</h4>

  <div class="btn-group">
<?php echo $select ?>
  </div>
<br>
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
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
$('#ruches').on('change', function() {
  var idRuche = this.value;
  $.ajax({
    type : 'POST',
    url : 'tableau.php',
    data : 'idRuche='+ idRuche,
    success : function(data){
      alert(data);
    }
  })
  });

</script>
</html>
