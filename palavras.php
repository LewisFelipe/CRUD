<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1>Dicionario</h1>
<a href="./dicionario.php">+ Cadastrar</a>
<br><br>

<form>
	<input type="text" name="key">
	<input type="submit" value="BUSCAR">
</form>

<?php
$dbObj = new mysql();
$sql = "";
$sql .= "SELECT * FROM dicionario INNER JOIN disciplina ON disciplina.id = id_disciplina";
if(isset($_GET["key"])) {
	$sql .= " WHERE palavra LIKE '%".$_GET["key"]."%' ";
}
$sql .= " ORDER BY palavra; ";
$result = $dbObj->query($sql);
if ($result)
{
?>
	<table>
		<tr>
			<th>Disciplina</th>
			<th>Palavra em Inglês</th>
			<th>Palavra</th>
			<th>Significado</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
<?php
		while ($row = mysqli_fetch_assoc($result)) {
?>
			<tr>
				<td><?=$row["name"];?></td>
				<td><?=$row["palavra_ingles"];?></td>
				<td><?=$row["palavra"];?></td>
				<td><?=$row["significado"];?></td>
				<td><a href="./dicionario.php?id=<?=$row["id"];?>">editar</a></td>
				<td><a href="./delete.php?id=<?=$row["id"];?>">apagar</a></td>
			</tr>
<?php
		}
?>
	</table>
<?php
}
?>

<?php
include("./layout/footer.php");
?>