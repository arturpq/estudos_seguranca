<?php 

session_start();
include('conexao.php');
include('funcoes.php');
include('validaradmingerente.php'); 

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$senhacriptografada = criptografar($senha);

$select = mysqli_fetch_row(mysqli_query($conexao, "SELECT cpf, login FROM login where cpf = '$cpf' or login = '$login'"));
$dadocpf = isset($select[0]) ? $select[0] : '';
$dadologin = isset($select[1]) ? $select[1] : '';
if ($nome <> '') {
 if (($dadocpf == NULL) && ($dadologin == NULL)) {
    echo 'Nulo';
    $insert = mysqli_query($conexao ,"INSERT INTO usuario (nome, cpf, telefone) values ('$nome','$cpf','$telefone')");
    $insert2 = mysqli_query($conexao, "INSERT INTO login (cpf, login, senha, nivel) VALUES ('$cpf','$login','$senhacriptografada', 3)");
    echo '<script>alert("Usuário cadastrado com sucesso");
    window.location="addusuario.php";
    </script>';
} else {
    echo '<script>alert("CPF e/ou Login Já cadastrados");
    window.location="addusuario.php";
    </script>';
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Segurança</title>
</head>
<body>
	<center>
		<h1>Adicionar Usuário</h1>
		<form id="form-addusuario" action="#" method="POST">
            Nome: <input type="text" name="nome" required><br><br>
            CPF: <input type="text" name="cpf" required><br><br>
            Telefone: <input type="text" name="telefone" required><br><br>
			Login: <input type="text" name="login" required><br><br>
			Senha: <input type="password" name="senha" required><br><br>
			<input type="submit" name="entrar" value="Entrar">
		</form>
        <br>
        <a href="principal.php">Voltar</a> 
	</center>
</body>

</html>
