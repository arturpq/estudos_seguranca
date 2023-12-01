<?php

session_start();

include('conexao.php');
include('validaradmin.php');

$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';

$admin = $_SESSION['cpf'];
date_default_timezone_set('America/Sao_paulo');
$data = date("Y-m-d H:i:s");

if ($nivel <> 0) {
    $update = mysqli_query($conexao ,"UPDATE login SET nivel = '$nivel' WHERE cpf = '$cpf'");
    $insert = mysqli_query($conexao ,"INSERT INTO log (cpf, cpf_alterado, data, novo_nivel) VALUES ('$admin', '$cpf', '$data', '$nivel')");
}
header('Location: mudaracesso.php');

?>