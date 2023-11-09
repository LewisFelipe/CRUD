<?php
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
	else
	{
		return true;
	}
}
?>
