<?php 

session_start();

if (isset($_POST['submit'])) 
{
	require 'dbh.php';

	$userName = mysqli_real_escape_string($connection, $_POST["username"]);
	$userPass = mysqli_real_escape_string($connection, $_POST["password"]);

	if (empty($userName) || empty($userPass)) 
	{
		header("Location: http://localhost/?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE userName = ?";

		$statement = mysqli_stmt_init($connection);

		if (!mysqli_stmt_prepare($statement, $sql)) 
		{
			header("Location: http://localhost/?login=error_");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($statement, 's', $userName);
			mysqli_stmt_execute($statement);

			$result = mysqli_stmt_get_result($statement);

			if ($row = mysqli_fetch_assoc($result)) 
			{
				$passwordCheck = password_verify($userPass, $row["userPass"]);

				if ($passwordCheck == false) 
				{
					var_dump($row);
					var_dump($userPass);
					echo password_hash($userPass, PASSWORD_DEFAULT);
					header("Location: index.php?wrongPassword");
					exit();
				}
				else
				{
					$_SESSION["username"] = $row["userName"];
					$_SESSION["email"] = $row["userEmail"];
					$_SESSION["userfirst"] = $row["userFirst"];
					$_SESSION["userlast"] = $row["userLast"];
					$_SESSION['userid'] = $row['id'];
					if ($_SESSION["username"] === 'admin') {
                        header("Location: http://localhost/adminpanel.php?login=AdminLoginSuccess");
                    } else {
                        header("Location: http://localhost/?login=LoginSuccess");
                    }
					exit();
				}
			}
			else
			{
				header("Location: http://localhost/?login=norows");
				exit();
			}
		}
	}

}


 ?>