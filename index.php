<?php
include("./conf/config.php");
include("./function/session.php");
validaSessao();
include("./layout/header.php");
include("./layout/menu.php");
?>

<section>
    <h1 class="display-3 text-white d-table mt-1 mb-3 ml-auto mr-auto"><strong>Bem vindo!!</strong></h1>
    <div class="rounded-container center text-center p-4" style="min-height: 100px">
        <h3>Este é um projeto para a matéria de Laboratório III feito por Henrique Carneiro, Rodrigo Moratto Aguilhar e Luis Felipe Paludetto Silva.</h3>
    </div>

</section>

<?php
include("./layout/footer.php");
?>