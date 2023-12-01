<?php

include('conexao.php');
include('funcoes.php');

$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$senhacriptografada = criptografar($senha);

$select = mysqli_fetch_row(mysqli_query($conexao, "SELECT login, senha, nivel, cpf FROM login WHERE login = '$login' AND senha = '$senhacriptografada'"));

if (isset($select[0]) == $login && isset($select[1]) == $senhacriptografada) {
	session_start();
	$_SESSION['login'] = $select[0];
	$_SESSION['nivel'] = $select[2];
	$_SESSION['logado'] = true;
	$_SESSION['cpf'] = $select[3];
	header('Location: principal.php');
} else {
	echo '<script>alert("Usuário ou senha incorretos");
			window.location="index.php";
			</script>';
}

?>