<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();

include("./function/validation.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	extract($_POST);
	if(validatePalavra($_POST, $error))
	{
		$dbObj = new mysql();
		if(isset($_POST["id"]) && ($_POST["id"] > 0))
		{
			$sql = "UPDATE dicionario
				SET id_disciplina = '%s', palavra_ingles = '%s', palavra = '%s' , significado = '%s'
				WHERE id = '".$id."'";
		}
		else
		{
			$sql = "INSERT INTO dicionario (id_disciplina, palavra_ingles, palavra, significado)
				VALUES ('%s', '%s', '%s', '%s')";
		}
		$query = sprintf($sql, mysqli_real_escape_string($dbObj->link_id, $id_disciplina), mysqli_real_escape_string($dbObj->link_id, $palavra_ingles), mysqli_real_escape_string($dbObj->link_id, $palavra), mysqli_real_escape_string($dbObj->link_id, $significado));
		$result = $dbObj->query($query);

		$dbObj->close(); // Fecha a ligação com o Banco de Dados

		header("Location: ./palavras.php");
		exit;
	}
}

if(isset($_GET["id"]))
{
	$dbObj = new mysql();
	$sql = "SELECT * FROM dicionario WHERE id = '".$_GET["id"]."';";
	$result = $dbObj->query($sql);
	if($result)
	{
		if($row = mysqli_fetch_assoc($result))
		{
			extract($row);
		}
	}

	$dbObj->close(); // Fecha a ligação com o Banco de Dados
}

include("./layout/header.php");
include("./layout/menu.php");
?>

<h1 class="display-3 text-light text-center mb-auto"><strong>DICIONÁRIO</strong></h1>

<?php
if (isset($error)) {
	echo "<span style=\"color: red; font-style: italic;\">";
	echo $error;
	echo "</span>";
}
?>

<section class="container d-flex p-auto align-middle rounded-container" style="min-height: 500px;">
	<form method="POST" class="w-100 h-100 p-5">
		<div class="form-group align-self-strech">
			<label for="palavra"><strong>Disciplina(ID):</strong></label>
			<input class="form-control" type="text" name="id_disciplina" value="<?=isset($id_disciplina)?$id_disciplina:"";?>">
		</div>
		<div class="form-group align-self-strech">
			<label for="palavra"><strong>Palavra em Inglês:</strong></label>
			<input class="form-control" type="text" name="palavra_ingles" value="<?=isset($palavra_ingles)?$palavra_ingles:"";?>">
		</div>
		<div class="form-group align-self-strech">
			<label for="palavra"><strong>Palavra:</strong></label>
			<input class="form-control" type="text" name="palavra" value="<?=isset($palavra)?$palavra:"";?>">
		</div>
		<div class="form-group align-self-strecth">
			<label for="significado"><strong>Significado:</strong></label>
			<textarea class="form-control" rows="2" name="significado"><?=isset($significado)?$significado:"";?></textarea>
		</div>
		<input class="btn btn-primary mt-4 w-100" w type="submit">
	</form>
</section>

<?php
include("./layout/footer.php");
?>