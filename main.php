<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="main">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">DELIZIOSO PIZZA</h1>
    <h2>A legjobb Olasz pizza az országban!</h2>
    <h2><b>Nyitva: 24/7</b></h2><br>
<section>
    <div class="nav-login">

        <?php 

          if (isset($_SESSION["username"])) 
          {
            echo '
                <form method="POST" action="logout.php">
                <button class="w3-button w3-red w3-round w3-padding-large w3-large" type="submit" name="submit">Kijelentkezés</button>
                </form>';
          }
          else
          {
            echo '<form method="post" action="login.php">
                <input type="text" name="username" placeholder="Felhasználónév">
                <input type="password" name="password" placeholder="Jelszó">
                <button class="btn btn-danger" type="submit" name="submit">Bejelentkezés</button>
                </form>';
          }

         ?>

      </div></section>
  </div>
</header>