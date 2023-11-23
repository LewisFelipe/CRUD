<?php

include("./conf/config.php");
include("./function/session.php");

validaSessao();

if(isset($_GET["id"]))
{
	$dbObj = new mysql();
	$sql = "SELECT * FROM dicionario WHERE dicionario.id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	if($result)
	{
		if($row = mysqli_fetch_assoc($result))
		{
			$dicionario = $row;
		}
	}

	$dbObj->close(); // Fecha a ligação com o Banco de Dados
}
if(!isset($dicionario["id"]))
{
	header("Location: ./palavras.php");
	exit;
}

if(isset($_GET["confirm"]))
{
	$dbObj = new mysql();
	$sql = "DELETE FROM dicionario WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);

	$dbObj->close(); // Fecha a ligação com o Banco de Dados

	header("Location: ./palavras.php");
	exit;
}

include("./layout/header.php");
include("./layout/menu.php");

?>

<h1>Apagar Palavra "<?=$dicionario["palavra"];?>"?</h1>

<a href="./delete.php?id=<?=$dicionario["id"];?>&confirm=yes">Confirmar</a>
<a href="./palavras.php">Cancelar</a>

<?php
include("./layout/footer.php");
?>
