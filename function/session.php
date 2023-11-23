<?php
function encodePassword($username, $password) { return hash('sha256', ($password . "+" . substr($username, 0, 3))); }

function contaValida($username, $password)
{
	$dbObj = new mysql();
	$sql = "SELECT * FROM conta WHERE usuario = '%s' AND senha = '".encodePassword($username, $password)."'";
	$query = sprintf($sql, mysqli_real_escape_string($dbObj->link_id, $username)); //Segurança contra SQL-Injection
	$result = $dbObj->query($query);
	if($result)
	{
		if($row = mysqli_fetch_assoc($result)) { return true; }
	}

	$dbObj->close(); // Fecha a ligação com o Banco de Dados

	return false;
}

function registraConta($username)
{
	session_start();
	session_unset();
	$dbObj = new mysql();
	$sql = "SELECT * FROM conta WHERE usuario = '%s'";
	$query = sprintf($sql, mysqli_real_escape_string($dbObj->link_id, $username)); //Segurança contra SQL-Injection
	$result = $dbObj->query($query);
	if($result)
	{
		if($row = mysqli_fetch_assoc($result))
		{
			$_SESSION["id"] = $row["id"];
		}
	}

	$dbObj->close(); // Fecha a ligação com o Banco de Dados
}

function logout()
{
	session_start();
	session_unset();
	session_destroy();
	header("Location: ./login.php");
	exit;
}

function validaSessao()
{
	session_start();
	if(empty($_SESSION["id"]))
	{
		header("Location: ./login.php");
		exit;
	}
}
?>