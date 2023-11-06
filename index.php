<?php
include("./conf/config.php");
include("./layout/header.php");
?>

<form>
	<input type="text" name="key">
	<input type="submit" value="BUSCAR">
</form>

<?php
$dbObj = new mysql();
$sql = "";
$sql .= " SELECT * FROM produto ";
if (isset($_GET["key"]))
{
	$sql .= " WHERE nome LIKE '%".$_GET["key"]."%' ";
}
$sql .= " ORDER BY nome; ";
$result = $dbObj->query($sql);
if ($result)
{
?>
	<table border="1px">
		<tr>
			<th>Nome</th>
			<th>Preco</th>
			<th>Favorito</th>
		</tr>
<?php
		while ($row = mysqli_fetch_assoc($result))
		{
?>
			<tr>
				<td><?=$row["nome"];?></td>
				<td><?=$row["preco"];?></td>
				<td><a href="">adicionar</a></td>
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