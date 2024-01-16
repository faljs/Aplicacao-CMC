<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<?php
		include ('header.php');
	?>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>

	<div class="wrapper">
	<?php
		include ('menu.php');
	?>
		<div class="main">
			<?php
				include ('top.php');
			?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Listar Usuários</h1>

			<!--	<div class="row">  -->
						<div class="col-12">  <!-- altera largura do formulario  col-6 -->
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Dados dos Usuários</h5>
								</div>
                                <?php

                                include_once('assets/cabecalho.php');
                                include_once('assets/rodape.php');
                                include('config/conexao.php');
                                include_once("config/seguranca.php");

                                seguranca_adm();
                                $consulta = "SELECT * FROM usuarios ";
                                $resultado = mysqli_query($conexao, $consulta);
                                ?>

                            <!--   faz aparecer os campos visualizar e editar não necessarios
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
-->
								<?php

										$consulta = "SELECT * FROM usuarios ";
										$resultado = mysqli_query($conexao, $consulta);
								?>



                        <table class="table table-bordered table-hover table-sm table-responsive-xl resultado usuario">
                            <thead>
                                <tr class="bg-dark text text-white">

                                    <th scope="col">NOME</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col" class="text text-center" colspan="3">AÇÃO</th>
                                </tr>
                            </thead>
                            <?php
                            while ($linha = mysqli_fetch_assoc($resultado)) {
                                $id = $linha['id'];
                                $nome = ucwords(strtolower($linha['nome']));
                                $usuario = $linha['usuario'];
                                $email = $linha['email'];
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo ucwords(strtolower($nome)); ?></td>
                                        <td><?php echo $linha['usuario']; ?></td>
                                        <td><?php echo $email; ?></td>
<!--
                                        <td class="text text-center">
                                            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#visulaizarUsuario" data-whatever="<?php echo $linha['id']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateverusuario="<?php echo $linha['usuario']; ?>" data-whateveremail="<?php echo $linha['email']; ?>" >

                                                <i class="far fa-eye text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar"></i>
                                            </a>
                                        </td>

                                        <td class="text text-center">
                                            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editarUsuario" data-whatever="<?php echo $linha['id']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateverusuario="<?php echo $linha['usuario']; ?>" data-whateveremail="<?php echo $linha['email']; ?>" >

                                                <i class="far fa-edit text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>
                                        </td>
    -->
                                        <td class="text text-center">
                                            <a href="processa_excluir_usuario.php?id=<?php echo $linha['id']; ?>" onClick="return confirm('Deseja realmente deletar o usuario?')">
                                                <i class="far fa-trash-alt text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir"></i></a>
                                        </td>

                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>


                        <script>
                            // ================================ FUNÇÃO PARA MASCARA DE TELEFONE =============================================
                            function mask(o, f) {
                                setTimeout(function() {
                                    var v = telefone(o.value);
                                    if (v != o.value) {
                                        o.value = v;
                                    }
                                }, 1);
                            }

                            function telefone(v) {
                                var r = v.replace(/\D/g, "");
                                r = r.replace(/^0/, ""); //limpa o campo se começar com ZERO (0)
                                if (r.length > 10) {
                                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                                } else if (r.length > 5) {
                                    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                                } else if (r.length > 2) {
                                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                                } else {
                                    r = r.replace(/^(\d*)/, "($1");
                                }
                                return r;
                            }

                            // ================================ FUNÇÃO PARA MASCARA DE CELULAR =============================================
                            function mask(o, f) {
                                setTimeout(function() {
                                    var v = celular(o.value);
                                    if (v != o.value) {
                                        o.value = v;
                                    }
                                }, 1);
                            }

                            function celular(v) {
                                var r = v.replace(/\D/g, "");
                                r = r.replace(/^0/, ""); //limpa o campo se começar com ZERO (0)
                                if (r.length > 10) {
                                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                                } else if (r.length > 5) {
                                    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                                } else if (r.length > 2) {
                                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                                } else {
                                    r = r.replace(/^(\d*)/, "($1");
                                }
                                return r;
                            }

                            // ================================ FUNÇÃO PARA MASCARA DE CPF =============================================
                            $(document).ready(function() {
                                $("#cpf").mask("999.999.999-99");
                            });
                        //
                            



                            $(document).ready(function() {

                                $('#insert_form').on('submit', function(event) {
                                    event.preventDefault(); //EVITA O SUBMIT DO FORM

                                    var nome = $('#nome'); // PEGA O CAMPO CLIENTE DO FORM
                                    var telefone = $('#usuario'); // PEGA O CAMPO TELEFONE DO FORM
                                    var email = $('#email');


                                    var erro = $('.alert-danger'); // PEGA O CAMPO COM A class alert e CRIA A VARIAVEL erro
                                    var campo = $('#campo-erro'); // CRIA A VARIAVEL PATA EXIBIR O NOME DO CAMPO COM ERROcampo-sucesso


                                    erro.addClass('d-none');
                                    $('.is-invalid').removeClass('is-invalid');
                                    $('.is-valid').removeClass('is-valid');


                                    if (!nome.val().match(/[A-Za-z\d]/)) {
                                        erro.removeClass('d-none'); //REMOVE A CLASSE (d-none) DO BOOTSTRAP E EXIBE O ALERTA
                                        campo.html('usuario'); // ADICIONA AO ALERTA O NOME DO CAMPO NAO PREENCHIDO
                                        nome.focus(); //COLOCA O CURSOR NO CAMPO COM ERRO
                                        nome.addClass('is-invalid');


                                        return false;

                                    } else if (!email.val().match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)) {
                                        erro.removeClass('d-none'); //REMOVE A CLASSE (d-none) DO BOOTSTRAP E EXIBE O ALERTA
                                        campo.html('email'); // ADICIONA AO ALERTA O NOME DO CAMPO NAO PREENCHIDO
                                        email.focus(); //COLOCA O CURSOR NO CAMPO COM ERRO
                                        email.addClass('is-invalid');

                                 
                                        return false;

                                    } else {

                                        var dados = $("#insert_form").serialize();
                                        $.post("processa_cad_usuario.php", dados, function(retorna) {
                                            if (retorna) {
                                                //Limpar os campo
                                                $('#insert_form')[0].reset();

                                                //Fechar a janela modal cadastrar
                                                $('#cadCliente').modal('hide');
                                                $('#sucessModal').modal('show');

                                                setInterval(function() {
                                                    var redirecionar = "processa_cad_usuario.php";
                                                    $(window.document.location).attr('href', redirecionar);

                                                }, 3000);

                                            } else {

                                                return false;
                                            }

                                        });

                                    }

                                });

                            });
                        </script>




</body>

</html>