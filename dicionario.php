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
				SET id_disciplina = '".$idDisciplina."', palavra_ingles = '".$palavraIngles."', palavra = '".$palavra."' , significado = '".$significado."'
				WHERE id = '".$id."'";
		}
		else
		{
			$sql = "INSERT INTO dicionario (id_disciplina, palavra_ingles, palavra, significado)
				VALUES ('".$idDisciplina."', '".$palavraIngles."', '".$palavra."', '".$significado."')";
		}
		$result = $dbObj->query($sql);
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
}

include("./layout/header.php");
include("./layout/menu.php");
?>

<h1>DICIONÁRIO</h1>

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
				Disciplina(ID):
			</td>
			<td>
				<input type="text" name="idDisciplina" value="<?=isset($idDisciplina)?$idDisciplina:"";?>">
			</td>
		</tr>
		<tr>
			<td>
				Palavra em Inglês:
			</td>
			<td>
				<input type="text" name="palavraIngles" value="<?=isset($palavraIngles)?$palavraIngles:"";?>">
			</td>
		</tr>
		<tr>
			<td>
				Palavra:
			</td>
			<td>
				<input type="text" name="palavra" value="<?=isset($palavra)?$palavra:"";?>">
			</td>
		</tr>
		<tr>
			<td>
				Significado:
			</td>
			<td>
				<textarea name="significado" value="<?=isset($significado)?$significado:"";?>"></textarea>
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