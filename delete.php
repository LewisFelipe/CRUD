<?php

include("../conf/config.php");
include("./function/session.php");

validaSessao();

if(isset($_GET["id"]))
{
	$dbObj = new mysql();
	$sql = "SELECT * FROM dicionario INNER JOIN disciplina ON disciplina.id = dicionario.id_disciplina WHERE dicionario.id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	if($result)
	{
		if($row = mysqli_fetch_assoc($result))
		{
			$dicionario = $row;
		}
	}
}
if(!isset($dicionario["id"]))
{
	header("Location: ./table.php");
	exit;
}

if(isset($_GET["confirm"]))
{
	$dbObj = new mysql();
	$sql = "DELETE FROM dicionario WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	header("Location: ./table.php");
	exit;
}

include("./layout/header.php");
include("./layout/menu.php");

?>

<h1>Apagar Palavra "<?=$dicionario["palavra"];?>"?</h1>

<a href="./delete.php?id=<?=$dicionario["id"];?>&confirm=yes"><img src="./layout/confirm.jpg"></a>
<a href="./table.php"><img src="./layout/cancel.jpg"></a>

<?php
include("./layout/footer.php");
?>
