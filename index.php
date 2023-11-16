<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<h1 class="display-3 text-white d-table mt-1 mb-3 ml-auto mr-auto"><strong>Bem vindo!!</strong></h1>

<button>Visualizar Tabelas</button>
<button>Adicionar Disciplina</button>
<button>Visualizar Palavra</button>

<?php
include("./layout/footer.php");
?>