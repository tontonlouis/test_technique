<?php
//db connection
$conn = new mysqli('127.0.0.1','root','', 'test_technique');

//query
$query=$conn->query("SELECT idRuche, nomRuche FROM ruche");
$select = '<select id="ruches"><option value="all"></option>';
while($rs=mysqli_fetch_array($query)){
  $select.='<option value='. $rs["idRuche"].'>' . $rs["nomRuche"] . '</option>';

  }
  $select.='</select>';


  $sql=$conn->query("SELECT * FROM etat");
  $tableau = '<tbody>';
  while($trs=mysqli_fetch_array($sql)){
    $tableau .='<tr>';
        $tableau.='<td align="center"><input type="checkbox" id="checkItem"></td>';
        $tableau.='<td>'.$trs['dateEtat'].'</td>';
        $tableau.='<td>'.$trs['Poids'].'</td>';
        $tableau.='<td>'.$trs['Temperature'].'</td>';
        $tableau.='<td>'.$trs['Humidite'].'</td>';
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
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-1 sidenav">
      <h4>Ruches</h4>
        <div class="btn-group">
          <?php echo $select ?>
        </div>
        <br> <br>
   </div>
   <br>
  <div class="col-sm-11">
        <table class='table table-bordered' id='tableauEtat'>
          <thead>
              <tr>
                <th scope="col-center"><input type="checkbox"  id="selectAll"></th>
                <th scope="col">Date</th>
                <th scope="col">Poids</th>
                <th scope="col">Temperature</th>
                <th scope="col">Humidité</th>
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
      arr = JSON.parse(data);
      string = '';
      for(i=0; i < arr.length; i++){
        string += "<tr><td align='center'><input type='checkbox' id='checkItem'></td><td>" +
        arr[i].dateEtat +
        "</td><td>" +
      arr[i].Poids +
        "</td><td>" +
        arr[i].Temperature +
        "</td><td>" +
        arr[i].Humidite +
        "</td></tr>";
      }

      $('#tableauEtat tbody').html(string);
  }
});
});

$('#SelectAll').click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

</script>
</html>
