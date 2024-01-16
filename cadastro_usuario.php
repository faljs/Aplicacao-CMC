<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<?php
		include ('header.php');
	?>

  <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

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

					<h1 class="h3 mb-3">Cadastrando Usúario</h1>

			<!--	<div class="row">  -->
						<div class="col-10">  <!-- altera largura do formulario  col-6 -->
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Informações</h5>
								</div>

								<div class="card-body">
								    <form action="back_cadastro_usuario.php" method="post">
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
								                        <label for="nome" class="form-label">Nome:</label>
								                        <input type="text" id="nome" name="nome" class="form-control" required autocomplete="off">
												</div>
											</div>
											<div class="col-6">
													<div class="mb-3">
								                        <label for="CPF" class="form-label">CPF:</label>
								                        <input type="text" id="usuario" name="usuario" class="form-control" title="Apenas números" required>
													</div>
											</div>
										</div>

										<div class="row">
											<div class="col-6">
												<div class="mb-3">
							                        <label for="email" class="form-label">E-mail:</label>
							                        <input type="email" id="email" name="email" class="form-control" required>
												</div>
											</div>
											<div class="col-6">
													<div class="mb-3">
								                        <label for="senha" class="form-label">Senha:</label>
								                        <input type="password" id="senha" name="senha" class="form-control" required>
													</div>
											</div>
										</div>

										<div class="mb-3">
										  <label for="formFile" class="form-label">Foto</label>
										  <input class="form-control" type="file" id="foto">
										</div>

										<div class="form col-md-2 mb-2">
					                        <button type="submit" class="btn btn-primary" id="btn-cadastrar">Salvar</button>
							            </div>
									</form>

								</div>
							</div>
						</div>
			<!--	</div>  -->

				</div>
			</main>
			<script type="text/javascript">
							<!-- Modal ALERTA DE CADASTRO COM SUCESSO-->
							<div class="modal fade" id="sucessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-lg">
							        <div class="modal-content">
							            <div class="modal-header">
							                <h5 class="modal-title" id="exampleModalLabel"></h5>

							            </div>
							            <div class="modal-body bg-success text text-center text-white">
							                CADASTRADO COM SUCESSO!
							            </div>
							            <div class="modal-footer">

							            </div>
							        </div>
							    </div>
							</div>
							<!-- Modal ALERTA DE CADASTRO NAO REALIZADO-->
							<div class="modal fade" id="dangerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-x1">
							        <div class="modal-content">
							            <div class="modal-header">
							                <h5 class="modal-title" id="exampleModalLabel"></h5>

							            </div>
							            <div class="modal-body bg-danger text text-center text-white">
							                NÃO CADASTRADO!
							            </div>
							            <div class="modal-footer">

							            </div>
							        </div>
							    </div>
							</div>
				</script>

			<footer class="footer">
			<?php
				include ('footer.php');
			?>
			</footer>
		</div>
	</div>
   <script type="text/javascript">    $(document).ready(function() {
        $("#usuario").mask("999.999.999-99");
    }); //nao funcionou
</script>


</body>

</html>