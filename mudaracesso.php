<?php

session_start();

include('conexao.php');
include('validaradmin.php');

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';

$select = mysqli_fetch_all(mysqli_query($conexao, "SELECT nome, descricao, nivel.id, login.cpf, telefone FROM usuario INNER JOIN login ON usuario.cpf = login.cpf INNER JOIN nivel ON nivel.id = nivel"));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudar Acesso</title>
</head>
<body>
    <center>
    <a href="principal.php">Voltar</a> <br>
    <br>
        
    <table border="3px">
            <tr>
                <td>Nome</td>
                <td>Tipo de Usuário</td>
                <td>Novo Tipo de Usuário</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Alterar</td>
            </tr>
        <?php
            $tamanho = count($select);
            for ($i = 0;$i < $tamanho; $i++) {
                
        ?> 
            <form name="mudatipo-<?php echo $i; ?>" action="mudartipo.php" method="POST">
            <tr>
                <td> <?php echo $select[$i][0]; ?> </td>
                <td> <?php echo $select[$i][1]; ?> </td>
                <td> 
                <select name="nivel">
                    <option value="0" hidden></option>
                    <option value="1">Administrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Usuário</option> 
                </select>  
                </td>
                <td>
                    <?php echo $select[$i][3]; ?>
                </td>
                <td>
						<input type="text" name="telefone" value=<?php echo $select[$i][4]; ?>>
				</td>
                <td><input type="submit" name="alterar" value="Alterar"> <input type="hidden" name="cpf" value="<?php echo $select[$i][3];?>">
                </td>
                
            </tr>
            </form>
        <?php
            }
            
        ?>
            </table>
    </center>
</body>
</html>