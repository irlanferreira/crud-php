<?php

include_once('funcs.php');
if (isset($_GET['id'])) {
    $dados = mysqli_fetch_array(getUsuario($_GET['id']));
    if (!isset($_POST['enviado'])) {
    } else {
        if (!isset($_GET['id'])) {
        } else {
            if (!$id = filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            } else {
                $usuarioNovo = $_POST['fUsuario'];
                $emailNovo = $_POST['fEmail'];
                $telNovo = $_POST['fTel'];
                if (editar($usuarioNovo, $emailNovo, $telNovo, $_GET['id'])) {
                    $msg = "Dados atualizados com sucesso";
                } else {
                    $msg = "Houve uma falha ao atualizar os dados";
                }
            }
        }
    }
}
if(isset($_GET['id'])){
    $dados=getUsuario($_GET['id']);
    $dados=mysqli_fetch_array($dados);
    $usuario = $dados['usuario'];
    $email = $dados['email'];
    $tel = $dados['telefone'];
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar usuário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/editar.css">
</head>

<body>
    <section>
        <div id="secheader">Editar usuário</div>
        <?= isset($msg) ? "<p style='margin: 10px 0px; background-color: rgba(250, 100, 100, 0.329); padding: 4px; border-radius: 4px;'>$msg</p>" : '' ?>

        <form action="" method="POST">
            <input type="text" name="fUsuario" value="<?= $usuario ?>" class="input" placeholder="Nome de Usuário" required><br>
            <input type="email" name="fEmail" value="<?= $email ?>" class="input" placeholder="Email" required><br>
            <input type="number" name="fTel" value="<?= $tel ?>" class="input" placeholder="Telefone" required><br>
            <input type="submit" class="input" id="cadastrar" name="enviado" value="Atualizar">
        </form>
        <a id="voltar" href="index.php">
            <p>Voltar</p>
        </a>
    </section>
</body>

</html>