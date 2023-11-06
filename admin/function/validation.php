<?php
function validateProduto($array, &$error)
{
	extract($array);
	$error = "";
	if(!$nome) { $error .= "* Nome Vazio!<br>"; }
	if(!$preco) { $error .= "* Preco Vazio!<br>"; }
	elseif(!is_numeric($preco)) { $error .= "* Preco Incorreto!<br>"; }
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
