<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1 class="display-3 text-light text-center mb-4"><strong>Disciplina</strong></h1>

<section>
	<div class="container">

		<form class="mb-4">
			<div class="form-group d-flex justify-content-center">
				<a href="./disciplina.php" class="btn btn-light"><b>Cadastrar</b></a>
				<input class="form-control ml-2 mr-1 col-md-8 col-6" type="text" name="key">
				<input class="btn btn-outline-light" type="submit" value="BUSCAR">
			</div>
		</form>

<?php
$dbObj = new mysql();
$sql = "";
$sql .= "SELECT * FROM disciplina";
if(isset($_GET["key"])) {
	$sql .= " WHERE name LIKE '%".$_GET["key"]."%' ";
}
$sql .= " ORDER BY name; "; // Adicionar filtro
$result = $dbObj->query($sql);
if ($result)
{
?>
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Disciplina</th>
					<th>Editar</th>
				</tr>

			</thead>
			<tbody>
<?php
			while ($row = mysqli_fetch_assoc($result))
			{
?>
				<tr class="text-light">
					<td class="align-middle"><b><?=$row["id"];?></b></td>
					<td class="align-middle"><?=$row["name"];?></td>
					<td><a href="./disciplina.php?id=<?=$row["id"];?>" class="btn btn-outline-light"><i class="fas fa-edit"></i></a></td>
				</tr>
<?php
			}

			$dbObj->close(); // Fecha a ligação com o Banco de Dados
?>
			</tbody>
		</table>
	</div>

</section>
<?php
}
?>

<?php
include("./layout/footer.php");
?>