<?php
include("../conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1>PRODUTOS</h1>
<a href="./produto.php" style="color: white;">+ Cadastrar</a>
<br><br>

<?php
$dbObj = new mysql();
$sql = "SELECT * FROM produto ORDER BY nome;";
$result = $dbObj->query($sql);
if ($result)
{
?>
	<table border="1px">
		<tr>
			<th>Nome</th>
			<th>Preco</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
<?php
		while ($row = mysqli_fetch_assoc($result))
		{
?>
			<tr>
				<td><?=$row["nome"];?></td>
				<td><?=$row["preco"];?></td>
				<td><a href="./produto.php?id=<?=$row["id"];?>" style="color: white;">editar</a></td>
				<td><a href="./apagar.php?id=<?=$row["id"];?>" style="color: white;">apagar</a></td>
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
