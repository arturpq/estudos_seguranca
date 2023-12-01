<?php

session_start();

include('conexao.php');

$cpf = $_SESSION['cpf'];

$dados = mysqli_fetch_row(mysqli_query($conexao, "SELECT nome, cpf, telefone FROM usuario WHERE cpf = '$cpf'"));

$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

if ($telefone <> NULL) {
    $update = "UPDATE usuario SET telefone = '$telefone' WHERE cpf = '$cpf' ";
    $queryupdate = mysqli_query($conexao, $update);
    header('Location: alterardados.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados</title>
</head>
<body>
    <center>
        <form id="form-altera" action="#" method="POST">
        <table border="1px">
            <tr>
                <td>Name</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Atualizar</td>
            </tr>
            <tr>
                <td><?php echo $dados[0] ?></td>
                <td><?php echo $dados[1] ?></td>
                <td><input type="text" name="telefone" value="<?php echo $dados[2] ?>"></td>
                <td><input type="submit" name="atualizar" value="Atualizar"></td>                
            </tr>
        </table>
        </form>
        <h3>Alterar Senha</h3>  
        <form id="alterar-senha" action="alterarsenha.php" method="POST">
            Nova senha: <input type="password" name="senha" required><br>    
            Confirmar senha: <input type="password" name="confirmasenha" required><br><br>
            <input type="submit" name="alterar" value="Alterar senha">
        </form>
        <br>
        <a href="principal.php">Voltar</a> 
        
    </center>

    
</body>
</html>