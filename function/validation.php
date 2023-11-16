<?php
function validateAccount($array, &$error)
{
	extract($array);
	$error = "";
	if(!$username) { $error .= "* Campo Usuário Vazio!<br>"; }
	if(strlen($username) < 6) { $error .= "* Campo Usuário Menor que 6 Caracteres!<br>"; }

	$dbObj = new mysql();
	$sql = "SELECT COUNT(*) AS QTD_USER FROM CONTA WHERE USERNAME = '".$username."'";
	$result = $dbObj->query($sql);

	if($result)
	{
		if($row = mysqli_fetch_assoc($result)) { $qtd_name = $row['QTD_USER']; }
	}

	if($qtd_name != 0) { $error .= "* Usuário já existente no Banco!<br>"; }


	if(!$password) { $error .= "* Campo Senha Vazio!<br>"; }
	if(strlen($password) < 6) { $error .= "* Campo Senha Menor que 8 Caracteres!<br>"; }

	if($error)
	{
		$error = "Erros:<br>".$error."<br>";
		return false;
	}

	return true;
}

function validatePalavra($array, &$error)
{
	extract($array);
	$error = "";
	if(!$idDisciplina) { $error .= "* Campo id_disciplina Vazio!<br>"; }
	elseif(!is_numeric($idDisciplina)) { $error .= "* Disciplina Incorreta!<br>"; }
	if(!$palavraIngles) { $error .= "* Campo palavra_inglês Vazio!<br>"; }
	if(!$palavra) { $error .= "* Campo palavra Vazio!<br>"; }
	if(!$significado) { $error .= "* Campo significado Vazio!<br>"; }

	if($error)
	{
		$error = "Erros:<br>".$error."<br>";
		return false;
	}

	return true;
}

function validateDisciplina($array, &$error)
{
	extract($array);
	$error = "";
	if(!$nomeDisciplina) { $error .= "* Campo Nome_Disciplina Vazio!<br>"; }

	$dbObj = new mysql();
	$sql = "SELECT COUNT(*) AS QTD_NAME FROM DISCIPLINA WHERE name = '".$nomeDisciplina."'";
	$result = $dbObj->query($sql);

	if($result)
	{
		if($row = mysqli_fetch_assoc($result)) { $qtd_nome = $row['QTD_NAME']; }
	}

	if($qtd_nome != 0) { $error .= "* Nome_Disciplina já existente no Banco!<br>"; }

	if($error)
	{
		$error = "Erros:<br>".$error."<br>";
		return false;
	}

	return true;
}
?>
