<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1>Disciplina</h1>
<a href="./disciplina.php">+ Cadastrar</a>
<br><br>

<form>
	<input type="text" name="key">
	<input type="submit" value="BUSCAR">
</form>

<?php
$dbObj = new mysql();
$sql = "";
$sql .= "SELECT * FROM disciplina";
if(isset($_GET["key"])) {
	$sql .= " WHERE name LIKE '%".$_GET["key"]."%' ";
}
$sql .= " ORDER BY name; ";
$result = $dbObj->query($sql);
if ($result)
{
?>
	<table>
		<tr>
			<th>ID</th>
			<th>Disciplina</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
<?php
		while ($row = mysqli_fetch_assoc($result)) {
?>
			<tr>
				<td><?=$row["id"];?></td>
				<td><?=$row["name"];?></td>
				<td><a href="./disciplina.php?id=<?=$row["id"];?>">editar</a></td>
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