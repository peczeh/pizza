<?php
include_once('dbh.php');

if (!isset($_POST['pizzak'])) {
	echo 'HIBA: pizzak nincs';
	exit();
}

if (!isset($_POST['kiRendelte'])) {
	echo 'HIBA: kiRendelte nincs';
	exit();
}

if (!isset($_POST['comment'])) {
	echo 'HIBA: komment nincs';
	exit();
}
	
	$rendeltPizzaLista = '';
	$megrendeltPizzakTomb = $_POST['pizzak'];
	$kiRendelte = mysqli_real_escape_string($connection, $_POST['kiRendelte']);
	$megjegyzes = mysqli_real_escape_string($connection, $_POST['comment']);

	$jelenlegiPizzaID = 0;
	$jelenlegiDarabszam = 0;

	foreach ($megrendeltPizzakTomb as $megrendeltPizza) {
		foreach ($megrendeltPizza as $pizzaid => $darabszam) {
			if (intval($darabszam) != $darabszam) 
				exit('Hibás formátum, kérlek csak egész számot adj meg!');
			if (intval($darabszam) > 10)
				exit('Túl sok a pizza!');
			$jelenlegiPizzaID = $pizzaid;
			$jelenlegiDarabszam = intval($darabszam);
		}
		
		if ($megrendeltPizza === end($megrendeltPizzakTomb)) { 
			$rendeltPizzaLista .= "$jelenlegiPizzaID,$jelenlegiDarabszam";
		} else {
			$rendeltPizzaLista .= "$jelenlegiPizzaID,$jelenlegiDarabszam;";
		}
	}

	$sql = "INSERT INTO orders SET userid = '$kiRendelte', ordered_items = '$rendeltPizzaLista', comment = '$megjegyzes'";
	if (mysqli_query($connection, $sql)) {
		echo 'Sikeres megrendelés! Hamarosan szállítjuk a pizzát.';
	} else {
		echo 'HIBA: Sikertelen megrendelés.';
	}
	exit();