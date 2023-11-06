<?php

function contaValida($username, $password) {
	$dbObj = new mysql();
	$sql = "SELECT * FROM conta WHERE usuario = '".$username."' AND senha = MD5('$password')";
	$result = $dbObj->query($sql);
	if ($result) {
		if ($row = mysqli_fetch_assoc($result)) {
			return true;
		}
	}
	return false;
}

function registraConta($username) {
	session_start();
	session_unset();
	$dbObj = new mysql();
	$sql = "SELECT * FROM conta WHERE usuario = '".$username."'";
	$result = $dbObj->query($sql);
	if ($result) {
		if ($row = mysqli_fetch_assoc($result)) {
			$_SESSION["CONTA_ID"] = $row["id"];
		}
	}
}

function logout() {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ./login.php");
	exit;
}

function validaSessao() {
	session_start();
	if (empty($_SESSION["CONTA_ID"])) {
		header("Location: ./login.php");
		exit;
	}
}

?>
