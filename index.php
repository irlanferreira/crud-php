<?php

include_once('funcs.php');
$usuariosQuery = getUsuarios();

if(isset($_GET['id'])){
    deletar($_GET['id']);
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div style="overflow-x: auto;">
        <section class="tabela">
            <table>
                <thead>
                    <th>Usuario</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Id</th>
                    <th>Operações</th>
                </thead>
                <tbody>
                    <?php while ($reg = mysqli_fetch_array($usuariosQuery)) {
                        $usuario = $reg['usuario'];
                        $email = $reg['email'];
                        $telefone = $reg['telefone'];
                        $id = $reg['id'];
                        echo"
                        <tr>
                            <td>$usuario</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>$id</td>
                            <td><a href='editar.php?' class='operacao' id='editar'>Editar</a><a href='index.php?id=$id' class='operacao' id='deletar'>Deletar</a></td>
                        </tr>
                        ";
                    } ?>
                </tbody>
            </table>
            <div style="margin-top: 10px;"><a href="adicionar.php" id="adicionar">Adicionar usuário</a></div>
        </section>
    </div>
</body>

</html>