<?php

include("../conf/config.php");
include("./function/session.php");

validaSessao();

if (isset($_GET["id"])) {
	$dbObj = new mysql();
	$sql = "SELECT * FROM produto WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	if ($result) {
		if ($row = mysqli_fetch_assoc($result)) {
			$produto = $row;
		}
	}
}
if (!isset($produto["id"])) {
	header("Location: ./produtos.php");
	exit;
}

if (isset($_GET["confirm"])) {
	$dbObj = new mysql();
	$sql = "DELETE FROM produto WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	header("Location: ./produtos.php");
	exit;
}

include("./layout/header.php");
include("./layout/menu.php");

?>

<h1>Apagar Produto "<?=$produto["nome"];?>"?</h1>

<a href="./apagar.php?id=<?=$produto["id"];?>&confirm=yes" style="color: white;"><img src="./layout/confirm.jpg"></a>
<a href="./produtos.php" style="color: white;"><img src="./layout/cancel.jpg"></a>

<?php
include("./layout/footer.php");
?>
