<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
// include_once("config/seguranca.php");
// seguranca_adm();
$consulta = "SELECT * FROM clientes ";
$resultado = mysqli_query($conexao, $consulta);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <form action="back_cadastro_usuario.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
