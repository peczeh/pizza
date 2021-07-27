<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8" lang="HU">
</head>

<body>
  <div class='container'><table class='table table-bordered table-striped'>
       <form method="POST" action="logout.php">
    <button class='btn btn-danger' style="padding: 15px; padding: 40px; margin: auto; width: 100%; font-family: Arial Black; margin-bottom: 30px;" type="submit" name="submit">Kijelentkezés
    </button>
  </form>
  <thead>
    <tr>
      <th>ID</th>
      <th>Rendelő</th>
      <th>Mit / Mennyit</th>
      <th>Megjegyzés</th>
      <th>Szállítási cím </th>
      <th>Telefonszám</th>
      <th>Törlés</th>
    </tr>
  </thead>
  <tbody>
<?php
error_reporting(E_ERROR);
require_once("dbh.php");

if (isset($_POST['deleteOrder'])) {
  $orderid = $_POST['deleteOrder'];
  $sql = "DELETE FROM orders WHERE id = '$orderid'";
  if (!mysqli_query($connection, $sql)) {
    exit('Hiba történt a megrendelés törlésekor.');
  }
}


$sql = "SELECT users.userLast as vezeteknev, users.userFirst as keresztnev, users.userTel as telszam, users.userIrsz as irsz, users.userVaros as varos, users.userUtca as utca, users.userEmelet as emelet, users.userEgyeb as egyeb, orders.id as rendeles_id, orders.ordered_items as rendelt_tetelek, orders.comment as megjegyzes FROM orders INNER JOIN users ON orders.userid = users.id";
$query = mysqli_query($connection, $sql);

$results = mysqli_fetch_all($query, MYSQLI_ASSOC); 

foreach ($results as $result) {
    $vegleges_rendeles = array();
    $rendelesek = explode(";", $result['rendelt_tetelek']);
    foreach ($rendelesek as $rendeles) {
        $vegleges_rendeles[] = explode(',', $rendeles);
    }

    $i = 0;
    foreach ($vegleges_rendeles as $key => $vegren) {
        $i = $i+1;
        $pizzaSql = "SELECT nev FROM pizzak WHERE id = '" . $vegren[0] . "'";
        $pizzaQuery = mysqli_query($connection, $pizzaSql);

        $pizzaResult = mysqli_fetch_all($pizzaQuery, MYSQLI_ASSOC)[0]["nev"];
if ($i == 1)
        $result["rendelt_tetelek"] = "<br>Pizza: " . $pizzaResult . ", " . $vegren[1] . " darab <br>"; 
else
        $result["rendelt_tetelek"] .= "Pizza: " . $pizzaResult . ", " . $vegren[1] . " darab <br>";
    }

echo "
    <tr>
      <td>" . $result['rendeles_id'] . "</td>
      <td>" . $result['vezeteknev'] . ' ' . $result['keresztnev'] ."</td>
      <td>" . $result['rendelt_tetelek'] . "</td>
      <td>" . $result['megjegyzes'] . "</td>
      <td>" . $result['irsz'] . ', ' . $result['varos'] . ', ' . $result['utca'] . ', ' . $result['emelet'] . ', ' . $result['egyeb'] . "</td>
      <td>" . $result['telszam'] . "</td>
      <td><button class='btn btn-primary deleteCurrentOrder' id='deleteCurrentOrder' data-order-id='".$result['rendeles_id']."'>Törlés</button></td>
    </tr>
";
}

?>
</tbody>
</table></div>

</body>
<script type='text/javascript'>
  $(function() {
    $('.deleteCurrentOrder').on('click', function() {
      let rendeles_id = $(this).attr('data-order-id'); //
      $.ajax({
       type: 'POST',
       url: `${window.origin}/adminpanel.php`, 
       data: {
        deleteOrder: rendeles_id
       },
       success: function() {
        alert('Megrendelés törölve!');
            location.reload(true);
       }
    });
    });
  });
</script>
</html>