<?php
require_once("dbh.php");

$sql = "SELECT * FROM pizzak";
$query = mysqli_query($connection, $sql);

$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>


<div class="w3-container w3-padding-64 w3-pale-red w3-center w3-wide" id="pizzas">
  <h1 class="w3-padding-64"><u>PIZZA VÁLASZTÉKAINK</u></h1>
  <h3 style="margin-bottom: 20px;">A rendeléshez és a kosárba helyezéshez bejelentkezés szükséges!</h3>
<center>
<table class="tabla" id="pizzakepe">
      <?php
        foreach ($results as $result) {
          if (isset($_SESSION["username"])) 
          {          
            echo "<tr><td id='pizza-kep'><img style='display:block; width:500px; height:300px; object-fit: cover' src='images/" . $result['kep'] . "'>
    </td>
        <td id='pizza-nev'>
      <b>". $result['nev'] ."</b> <br>
        ". $result['feltet'] ."
    </td>
        <td id='pizza-ar'>
      ". $result['ar'] . ' Ft ' ."
    </td>
        <td id='pizza-db'>
    <input class='pizzadarab' id='darabszam".$result['id']."' type='number' name='darabszam' maxlength='2' min='0' max='10' value='0'>
    </td>
        <td id='kosar'>
        <button onclick='addPizzaToCart(".$result['id'].")' id='addToCart' class='w3-button w3-round w3-red w3-opacity w3-hover-opacity-off'>Kosárba</button>
    </td>
    </tr>";
        } else {
          echo "<tr><td id='pizza-kep'><img style='display:block; width:500px; height:300px; object-fit: cover' src='images/" . $result['kep'] . "'>
    </td>
        <td id='pizza-nev'>
      <b>". $result['nev'] ."</b> <br>
        ". $result['feltet'] ."
    </td>
        <td id='pizza-ar'>
      ". $result['ar'] . ' Ft ' ."
    </td>
        <td id='pizza-db'>
    <input class='pizzadarab' id='darabszam".$result['id']."' type='number' name='darabszam' maxlength='2' min='0' max='10' value='0'>
    </td>
        <td id='kosar'>
        <img src='basket.png'>
    </td>
    </tr>";
        }
      }
      ?>

</table>
  <div class="megjegyzem">
  <h5 class="megjegy">MEGJEGYZÉS: </h5>
  <textarea name="comments" id="egyeb" class="comments" placeholder='Pl.: Nem kér valamit feltétnek.&#10;(Max. 1000 betű)'>
</textarea>
</div>
<!-- ha nincs belépve / be van lépve -->
<?php
          if (isset($_SESSION["username"])) 
          {
            echo ' <p class="w3-xlarge">
            <button id="makeOrderButton" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px ; margin-top: 70px;" >Megrendelem</button>
                  </p>
                  <p class="w3-xlarge">
            <button id="cancelKosar" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px ; margin-top: 70px;" >Kosár tartalmának törlése</button>
                  </p>';
          }
          else
          {
            echo '<br><h1 style="color: red;"><b> Jelentkezzen be!</b></h1>';
          }
?>

</center>
</div>

<script type="text/javascript">
  let kosarTomb = [];
  let userid = <?= $_SESSION['userid'] ?>;

function addPizzaToCart(pizzaid) { 
	
	let darabszam = document.getElementById(`darabszam${pizzaid}`).value; 

if (darabszam > 0) {

	alert(`A rendelni kívánt pizzát és mennyiséget sikeresen a kosarába tette.`); 

  let obj = {}; 
  obj[pizzaid] = darabszam; 
  kosarTomb.push(obj); 
} else {
 alert('Adjon meg 0-nál nagyobb darabszámot!')
}
}

$(function() {
$("#makeOrderButton").on('click', function() {
  if (kosarTomb.length > 0) {
    makeOrder();
  } else {
    alert('Nem tett semmit a kosarába.')
  }

});

$("#cancelKosar").on('click', function() {
  kosarTomb = [];
  alert('A kosár tartalma törölve!');
});

function makeOrder() {
$.ajax({
       type: "POST",
       url: `${window.origin}/make_order.php`, 
       data: {
        pizzak: kosarTomb,
        kiRendelte: userid,
        comment: $("#egyeb").val()
       },
       success: function(response) {
            alert(response);
       }
    });
}


$(".pizzadarab").keydown(function () {
    if (!$(this).val() || (parseInt($(this).val()) <= 10 && parseInt($(this).val()) >= 0))
    $(this).data("old", $(this).val());
  });

  $(".pizzadarab").keyup(function () {
    if (!$(this).val() || (parseInt($(this).val()) <= 10 && parseInt($(this).val()) >= 0) && ($(this).val() % 1 === 0))
      ;
    else
      $(this).val($(this).data("old"));
  });
});
</script>