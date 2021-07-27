<!-- Regisztráció -->
<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min w3-center" id="regist">
  <div class="w3-content">
    <h1 class="w3-text-grey"><b>REGISZTRÁCIÓ</b></h1>

<div id="notification" name="notification" style="color: red; font-size: 18px; font-family: Arial Black; padding: 10px;"><?php if (isset($_GET['signup'])) {
    switch ($_GET['signup']) {
        case 'empty':
            echo "<b><u>Minden mező kitöltése kötelező!</u></b>";
            break;
        case 'WrongEmail':
            echo "<b><u>Hibás e-mail formátum.</u></b>";
            break;
        case 'WrongCharacters':
            echo "<b><u>Hibás karaktert adtál meg valahol.</u></b>";
            break;        
        case 'ConnectError':
            echo "<b><u>Ismeretlen hiba történt.</u></b>"; // mysql error
            break;
        case 'Conn2error':
            echo "<b><u>Ismeretlen hiba történt.</u></b>"; // mysql error
            break;
        case 'UserAlreadyExists':
            echo "<b><u>Már létező felhasználónév.</u></b>";
            break;
        case 'Success':
            echo "<b><u>Sikeres regisztráció. Most lépj be!</u></b>";
            break;
    }
}
?>
       </div>   

   <div class="w3-row">
    <center>
    <table class="regist-table">
        <form class="signup-form" method="POST" action="signup.php">
<tr>
<td>Felhasználónév:</td>
<td><input type="text" name="username" placeholder="Felhasználónév"></td>
</tr>
<tr>
<td>Email cím:</td>
<td><input type="text" name="email" placeholder="Email cím"></td>
</tr>
<tr>
<td>Jelszó:</td>
<td><input type="password" name="password" placeholder="Min.8 betű, 1 NAGY"></td>
</tr>
<tr>
<td>Vezetéknév:</td>
<td><input type="text" name="lastname" placeholder="Vezetéknév"></td>
</tr>
<tr>
<td>Keresztnév:</td>
<td><input type="text" name="firstname" placeholder="Keresztnév"></td>
</tr>
<tr>
<td>Telefonszám:</td>
<td><input type="text" name="telszam" placeholder="pl.: 06209099911"></td>
</tr>
<tr>
<td>Lakcím:</td>
<td><input type="text" name="irsz" placeholder="Irányítószám"></td>
</tr>
<tr>
<td></td>
<td><input type="text" name="varos" placeholder="Város"></td>
</tr>
<tr>
<td></td>
<td><input type="text" name="utca" placeholder="Utca, Házszám"></td>
</tr>
<tr>
<td></td>
<td><input type="text" name="emelet" placeholder="Emelet, Ajtó"></td>
</tr>
<tr>
<td></td>
<td><input type="text" name="egyeb" placeholder="Egyéb: kapucsengő"></td>
</tr>
<tr>
    <td></td>
    <td><button style="margin-top: 50px; margin-bottom: 100px;" class=" w3-center w3-button w3-black w3-round w3-padding-large w3-large" type="submit" name="submit">Regisztrálok</button></td>
    </tr>
</form>
</table>
   </center>
  </div>
</div>