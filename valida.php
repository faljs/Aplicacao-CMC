<?php
session_start();
include('config/conexao.php');

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']); 
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha = md5($senha);

    $result_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' && senha = '$senha'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);
    $token = md5($usuario . $senha);
    $result_token = $resultado['token'];

    if (trim($result_token) === trim($token)) {
        $_SESSION['usuarioToken'] = $resultado['token'];
        $_SESSION['usuarioNome'] = $resultado['nome'];
        $_SESSION['usuarioLogin'] = $resultado['usuario'];
        $_SESSION['usuarioSenha'] = $resultado['senha'];
        header("Location: listar_clientes.php");
    } else if ($resultado) {
        $_SESSION['usuarioToken'] = $token;
        $_SESSION['usuarioNome'] = $resultado['nome'];
        $_SESSION['usuarioLogin'] = $resultado['usuario'];
        $_SESSION['usuarioSenha'] = $resultado['senha'];

        $usuario = $resultado['usuario'];
        $senha = $resultado['senha'];

        $inserir_token = ("UPDATE usuarios SET token='$token' WHERE usuario = '$usuario' && senha = '$senha'");
        $resultado_token = mysqli_query($conexao, $inserir_token);

        header("Location: inicio.php"); // se login estiver correto vai para esta tela
    } else {
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: login.php");
    }
} else {
    $_SESSION['loginErro'] = "Informe o usuário e a senha";
    header("Location: login.php");
}
?>
