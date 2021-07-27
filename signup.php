<?php 

if (isset($_POST['submit'])) {
	include_once 'dbh.php';

	$username = mysqli_real_escape_string($connection, $_POST['username']); 
	$userpass = mysqli_real_escape_string($connection, $_POST['password']);
	$useremail = mysqli_real_escape_string($connection, $_POST['email']);
	$userfirst = mysqli_real_escape_string($connection, $_POST['firstname']);
    $userlast = mysqli_real_escape_string($connection, $_POST['lastname']);
    $telszam = mysqli_real_escape_string($connection, $_POST['telszam']);
    $irsz = mysqli_real_escape_string($connection, $_POST['irsz']);
    $varos = mysqli_real_escape_string($connection, $_POST['varos']);
    $utca = mysqli_real_escape_string($connection, $_POST['utca']);
    $emelet = mysqli_real_escape_string($connection, $_POST['emelet']);
    $megjegyzes = mysqli_real_escape_string($connection, $_POST['egyeb']);

	if (empty($username) || empty($userpass) || empty($useremail) || empty($userfirst) || empty($userlast) || empty($telszam) || empty($irsz) || empty($varos) || empty($utca) || empty($emelet) || empty($megjegyzes))
	{
		header("Location: http://localhost/?signup=empty");
		exit();
	}
	else
	{
		if (!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9._]*$/", $username)
			 ||
			!preg_match('^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$', $userpass) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ-]*$/", $userfirst) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ-]*$/", $userlast) || 
			!preg_match("/^[ 0-9+-]*$/", $telszam) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ,- ]*$/", $varos) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9,.- ]*$/", $utca) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9.,- ]*$/", $emelet) || 
			!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9,.- ]*$/", $megjegyzes))
		{
			header("Location: http://localhost/?signup=WrongCharacters");
			exit();
		}
		else
		{
			if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) 
			{
				header("Location: http://localhost/?signup=WrongEmail");
				exit();
			}
			else
			{
				$sql = "SELECT * FROM users WHERE userName = ?";

				$statement = mysqli_stmt_init($connection);

				if (!mysqli_stmt_prepare($statement, $sql)) 
				{
					header("Location: http://localhost/?signup=ConnectError");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($statement, "s", $username); 

					mysqli_stmt_execute($statement); 

					mysqli_stmt_store_result($statement); 

					$resultCheck = mysqli_stmt_num_rows($statement); /

                    mysqli_stmt_close($statement);

					if ($resultCheck > 0) 
					{
						header("Location: http://localhost/?signup=UserAlreadyExists");
						exit();
					}
					else
					{
						$hashedPassword = password_hash($userpass, PASSWORD_DEFAULT);

						$sql = "INSERT INTO users (userName, userPass, userEmail, userFirst, userLast, userTel, userIrsz, userVaros, userUtca, userEmelet, userEgyeb) VALUES (?,?,?,?,?, ?, ?, ?, ?, ?, ?);";

						$statement2 = mysqli_stmt_init($connection);

						if (!mysqli_stmt_prepare($statement2, $sql)) 
						{
							header("Location: http://localhost/?signup=Conn2error");
							exit();
						}
						else
						{
							mysqli_stmt_bind_param($statement2, "sssssssssss", $username, $hashedPassword, $useremail, $userfirst, $userlast, $telszam, $irsz, $varos, $utca, $emelet, $megjegyzes);

							mysqli_stmt_execute($statement2);
                            mysqli_stmt_close($statement2);
							header("Location: http://localhost/?signup=Success");
							exit();
						}
					}
				}
			}
		}
	}
}
else
{
	header("Location: http://localhost/?signup=buttonerror");
	exit();
}

?>