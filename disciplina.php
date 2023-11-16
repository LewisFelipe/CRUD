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
				SET name = '".$nomeDisciplina."' WHERE id = '".$id."'";
		}
		else
		{
			$sql = "INSERT INTO disciplina(name)
				VALUES('".$nomeDisciplina."')";
		}
		$result = $dbObj->query($sql);
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
				ID:
			</td>
			<td>
				<p><?=isset($id)?$id:"";?></p>
			</td>
		</tr>
		<tr>
			<td>
				Disciplina:
			</td>
			<td>
				<input type="text" name="nomeDisciplina" value="<?=isset($nomeDisciplina)?$nomeDisciplina:"";?>">
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