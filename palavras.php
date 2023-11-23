<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1 class="display-3 text-light text-center mb-4"><strong>Dicionario</strong></h1>

<section>
	<div class="container">

		<form class="mb-4">
			<div class="form-group d-flex justify-content-center">
				<a href="./dicionario.php" class="btn btn-light"><b>Cadastrar</b></a>
				<input class="form-control ml-2 mr-1 col-md-8 col-6" type="text" name="key">
				<input class="btn btn-outline-light" type="submit" value="BUSCAR">
			</div>
		</form>

<?php
$dbObj = new mysql();
$sql = "";
$sql .= "SELECT dicionario.id, name, id_disciplina, palavra_ingles, palavra, significado FROM dicionario INNER JOIN disciplina ON disciplina.id = id_disciplina";
if(isset($_GET["key"])) {
	$sql .= " WHERE palavra LIKE '%".$_GET["key"]."%' ";
}
$sql .= " ORDER BY palavra; ";
$result = $dbObj->query($sql);
if ($result)
{
?>
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th>Disciplina</th>
					<th>Palavra em Inglês</th>
					<th>Palavra</th>
					<th>Significado</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>
			<tbody>
<?php
		while ($row = mysqli_fetch_assoc($result)) {
?>
				<tr class="text-light">
					<td><?=$row["name"];?></td>
					<td><?=$row["palavra_ingles"];?></td>
					<td><?=$row["palavra"];?></td>
					<td><?=$row["significado"];?></td>
					<td><a href="./dicionario.php?id=<?=$row["id"];?>" class="btn btn-outline-light"><i class="fas fa-edit"></i></a></td>
					<td><a href="./delete.php?id=<?=$row["id"];?>" class="btn btn-outline-light"><i class="fas fa-trash-alt"></i></a></td>
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