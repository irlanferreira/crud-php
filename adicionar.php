<?php

include_once('funcs.php');

if(isset($_POST['enviado'])){
    $usuario=$_POST['fUsuario'];
    $email=filter_var($_POST['fEmail'], FILTER_SANITIZE_EMAIL);
    $telefone=filter_var($_POST['fTel'], FILTER_SANITIZE_NUMBER_INT);
    
    if(cadastrar($usuario,$email,$telefone)){
        $msg="Usuario cadastrado com sucesso.";
    }else{
        $msg="Falha ao cadastrar usuário.";
    }
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
        <div id="secheader">Cadastrar novo usuario</div>
        <?=isset($msg)?"<p style='margin: 10px 0px; background-color: rgba(250, 100, 100, 0.329); padding: 4px; border-radius: 4px;'>$msg</p>":''?>
        
        <form action="" method="POST">
            <input type="text" name="fUsuario" class="input" placeholder="Nome de Usuário" required><br>
            <input type="email" name="fEmail" class="input" placeholder="Email" required><br>
            <input type="number" name="fTel" class="input" placeholder="Telefone" required><br>
            <input type="submit" class="input" id="cadastrar" name="enviado" value="Cadastrar">
        </form>
        <a id="voltar" href="index.php"><p>Voltar</p></a>
    </section>
</body>
</html>