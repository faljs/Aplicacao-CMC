<?php
session_start();
include('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de redefinição de senha aqui
    // ...

    // Exibir uma mensagem de sucesso ou erro
    $_SESSION['redefinirSenhaMensagem'] = 'Sua senha foi redefinida com sucesso.';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
      <link rel="shortcut icon" href="image/favicon.ico"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Sistema de Cadastro Conscritos</title>

  <!-- ==================================================== CSS BOOTSTRAP ================================================= -->
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/" rel="stylesheet" 
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<!-- ==================================================== UNICONS ==================================================== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- ==================================================== BUNDLE JS BOOTSTRAP ==================================================== -->

  <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin">
        <form class="needs-validation" novalidate method="POST" action="redefinir_senha.php">
            <img class="mb-4" src="image/6rm.png" alt="" width="80" height="111" />
            <h1 class="h3 mb-3 fw-normal">Redefinir Senha</h1>

            <?php
            if (isset($_SESSION['redefinirSenhaMensagem'])) {
                echo '<div class="alert alert-info" style="max-width: 400px; margin: 0 auto;">' . $_SESSION['redefinirSenhaMensagem'] . '</div>';
                unset($_SESSION['redefinirSenhaMensagem']); // Limpa a mensagem após exibi-la
            }
            ?>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="nova_senha" placeholder="Nova Senha" required>
                <label for="floatingPassword">Nova Senha</label>
                <div class="invalid-feedback">
                    Informe uma nova senha.
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Redefinir Senha</button>

            <br><br>
            <a button class="w-100 btn btn-lg btn-primary "href="inicio.php">Voltar</a>

            <p class="mt-5 mb-1 text-muted">&copy; 2023 - <?php echo date('Y') ?></p>
            <p class="mt-1 mb-1 text-muted">Sistema de Cadastro - STI 6ªRM - All Rights Reserved</p>
            <p class="mt-1 mb-1 text-muted">Versão 1.1</p>
        </form>

    </main>

    <!-- BUNDLE JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Outros elementos da página aqui -->
    <script>
        // SCRIPT DE VALIDAÇÃO DO PRÓPRIO BOOTSTRAP
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>
