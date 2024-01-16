<?php
session_start();
include_once __DIR__ . '/config/conexao.php';;

if (isset($_POST['nome']) && isset($_POST['usuario']) && isset($_POST['senha'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    

    // Gera um token aleatório
    $token = md5(uniqid(rand(), true));

    // Hash da senha (você pode querer usar uma técnica mais segura)
    $senha = md5($senha);

    $sql = "INSERT INTO usuarios (nome, usuario, senha, token, email) VALUES ('$nome', '$usuario', '$senha', '$token',  '$email')";

    if (mysqli_query($conexao, $sql)) {
        // Usuário cadastrado com sucesso
        header("Location: listar_usuario.php");
    } else {
        // Erro ao cadastrar o usuário
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    // Dados do formulário não recebidos
    echo "Erro: Dados do formulário não recebidos.";
}
?>