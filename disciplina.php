<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();

include("./function/validation.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	extract($_POST);
	if(validateDisciplina($_POST, $error))
	{
		$dbObj = new mysql();
		if(isset($_POST["id"]) && ($_POST["id"] > 0))
		{
			$sql = "UPDATE disciplina
				SET name = '%s' WHERE id = '".$id."'";
		}
		else
		{
			$sql = "INSERT INTO disciplina(name)
				VALUES('%s')";
		}
		$query = sprintf($sql, mysqli_real_escape_string($dbObj->link_id, $name));
		$result = $dbObj->query($query);

		$dbObj->close(); // Fecha a ligação com o Banco de Dados

		header("Location: ./disciplinas.php");
		exit;
	}
}

if(isset($_GET["id"]))
{
	$dbObj = new mysql();
	$sql = "SELECT * FROM disciplina WHERE id = '".$_GET["id"]."';";
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

<h1 class="display-3 text-light text-center mb-5"><strong>DICIONÁRIO</strong></h1>

<?php
if (isset($error)) {
	echo "<span style=\"color: red; font-style: italic;\">";
	echo $error;
	echo "</span>";
}
?>

<section class="container d-flex p-auto align-middle rounded-container">
	<form method="POST" class="w-100 h-100 p-5">
		<div class="form-group align-self-strech">
			<label><strong>ID:</strong></label>
			<span class="form-control"><b><?=isset($id)?$id:"";?></b></span>
		</div>
		<div class="form-group align-self-strecth">
			<label for="name"><strong>Disciplina:</strong></label>
			<input class="form-control" type="text" name="name" value="<?=isset($name)?$name:"";?>">
		</div>
		<input class="btn btn-primary mt-4 w-100" type="submit">
	</form>
</section>

<?php
include("./layout/footer.php");
?>