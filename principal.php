<?php

session_start();

include('conexao.php');
include('validarlogin.php');

$nivel = $_SESSION['nivel']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <?php
        if ($nivel < 3) {?>
        <a href = "addusuario.php">Adicionar Usuário </a> |
        <?php
        }
        if ($nivel == 1) {?>
                <a href = "mudaracesso.php">Mudar Acesso</a> |
            <?php
        }
        ?>
        <a href = "alterardados.php">Alterar Dados</a>  
        <br>
        <a href = "pesquisarcnpj.php">Pesquisar CNPJ</a>
        <br>
        <a href = "logout.php">Sair</a>
    </center>
</body>
</html>
