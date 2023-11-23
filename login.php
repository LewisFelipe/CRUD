<?php

include("./conf/config.php");
include("./function/session.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(contaValida($_POST["username"], $_POST["password"]))
	{
		registraConta($_POST["username"]);
		header("Location: ./index.php");
		exit;
	}
	$username = $_POST["username"];
	$mensagem = "Usuario ou Senha incorreto(s)!";
}

include("./layout/header.php");
?>

<h1 class="display-3 text-light text-center mb-5"><strong>LOGIN</strong></h1>

<section class="container d-flex p-auto align-middle rounded-container center" style="min-height: 300px;">
	<form name="formLogin" method="POST" class="w-100 h-100 p-5">
		<div class="form-group align-self-strech">
			<label for="palavra"><strong>Username:</strong></label>
			<input class="form-control" type="text" name="username" value="<?=isset($username)?$username:"";?>">
		</div>
		<div class="form-group align-self-strech">
			<label for="palavra"><strong>Password:</strong></label>
			<input class="form-control" type="password" name="password" value="<?=isset($password)?$password:"";?>">
		</div>
		<input class="btn btn-primary mt-4 w-100" type="submit" value="Entrar">
	</form>
</section>

<script language="JavaScript" type="text/javascript">
	<!--
	if(document.formLogin.username.value)
	{
		document.formLogin.password.focus();
	}
	else
	{
		document.formLogin.username.focus();
	}
	//-->
</script>

<?php include("./layout/footer.php"); ?>
