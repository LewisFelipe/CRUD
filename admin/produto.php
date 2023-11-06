<?php
include("../conf/config.php");
include("./function/session.php");
validaSessao();

include("./function/validation.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);
	if (validateProduto($_POST, $error)) {
		$dbObj = new mysql();
		if (isset($_POST["id"]) && ($_POST["id"] > 0)) {
			$sql = "UPDATE produto SET nome = '".$nome."', preco = '".$preco."' WHERE id = '".$id."'";
		} else {
			$sql = "INSERT INTO produto (nome, preco) VALUES ('".$nome."', '".$preco."')";
		}
		$result = $dbObj->query($sql);
		header("Location: ./produtos.php");
		exit;
	}
}

if (isset($_GET["id"])) {
	$dbObj = new mysql();
	$sql = "SELECT * FROM produto WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	if ($result) {
		if ($row = mysqli_fetch_assoc($result)) {
			extract($row);
		}
	}
}

include("./layout/header.php");
include("./layout/menu.php");
?>

<h1>PRODUTO</h1>

<?php
if (isset($error)) {
	echo "<span style=\"color: red; font-style: italic;\">";
	echo $error;
	echo "</span>";
}
?>

<form method="POST">
	<input type="hidden" name="id" value="<?=isset($id)?$id:"";?>">
	<table>
		<tr>
			<td>
				Nome:
			</td>
			<td>
				<input type="text" name="nome" value="<?=isset($nome)?$nome:"";?>">
			</td>
		</tr>
		<tr>
			<td>
				Preco:
			</td>
			<td>
				<input type="text" name="preco" value="<?=isset($preco)?$preco:"";?>">
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit">
			</td>
		</tr>
	</table>
</form>

<?php
include("./layout/footer.php");
?>
