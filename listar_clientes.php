
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<?php
		include ('header.php');
	?>
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

					<h1 class="h3 mb-3">Listar Clientes</h1>

			<!--	<div class="row">  -->
						<div class="col-12">  <!-- altera largura do formulario  col-6 -->
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Dados dos Clientes</h5>
								</div>
								<div class="card-body">

								<?php

								include_once('assets/cabecalho.php');
								include_once('assets/rodape.php');
								include('config/conexao.php');
								include_once("config/seguranca.php");

								seguranca_adm();
								$consulta = "SELECT * FROM clientes ";
								$resultado = mysqli_query($conexao, $consulta);
								?>

								<!--------------------------------------------------------CAMPO PARA COLOCAR OS MODAIS------------------------------------------------------------------------------->


								<table class="table table-bordered table-hover table-sm table-responsive-xl resultado_cliente">
								    <thead>
								        <tr class="bg-dark text text-white">

								            <th scope="col">CÓD</th>
								            <th scope="col">NOME</th>
								            <th scope="col">TELEFONE</th>
								            <th scope="col">ENDEREÇO</th>
								            <th scope="col">CPF</th>
								            <th scope="col">IDT</th>
								            <th scope="col">NASCIMENTO</th>
								            <th scope="col">RESPONSÁVEL</th>
								            <th scope="col" class="text text-center" colspan="3">AÇÕES</th>
								        </tr>
								    </thead>
								    <?php
								    while ($linha = mysqli_fetch_assoc($resultado)) {
								        $id = $linha['id'];
								        $nome = ucwords(strtolower($linha['nome']));
								        $telefone = $linha['telefone'];
								        $responsavel = $linha['criado_por'];
								        $situacao = $linha['situacao'];
								    //    $alterado_por = $linha['alterado_por'];
								        $cpf = $linha['cpf'];
								        $idt = $linha['idt'];


								        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
								    //    $ultima_alteracao = $linha['ultima_alteracao'];
								    //    $ultima_alteracao = date('d/m/Y H:i:s',  strtotime($ultima_alteracao));

								        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
								        $data_cadastro = $linha['data_cadastro'];
								        $data_cadastro = date('d/m/Y H:i:s',  strtotime($data_cadastro));

								        // CONVERTENDO NASCIMENTO PARA PADRAO PORTUGUES-BR
								        $nascimento = $linha['nascimento'];
								        $nascimento = date('d/m/Y',  strtotime($nascimento));

								        $rua = $linha['rua'];
								        $bairro = $linha['bairro'];
								        $rua = $linha['rua'];
								        $numero = $linha['numero'];
								        $cidade = $linha['cidade'];
								        $uf = $linha['uf'];

								        $endereco = $rua . ", " . $numero . " - " . $bairro . "-" . $cidade . "/" . $uf;
								    ?>
								        <tbody>
								            <tr>
								                <td><?php echo $id ?></td>
								                <td><?php echo ucwords(strtolower($nome)); ?></td>
								                <td><?php echo $linha['telefone']; ?></td>
								                <td><?php echo $endereco; ?></td>
								                <td><?php echo $cpf; ?></td>
								                <td><?php echo $idt; ?></td>
								                <td><?php echo $nascimento ?></td>
								                <td><?php echo $responsavel ?></td>
								                <td class="text text-center">

								                    <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#visulaizarCliente" data-whatever="<?php echo $linha['id']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateveremail="<?php echo $linha['email']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whateverrua="<?php echo ucwords(strtolower($linha['rua'])); ?>" data-whatevernumero="<?php echo $linha['numero']; ?>" data-whateverbairro="<?php echo $linha['bairro']; ?>" data-whatevercomplemento="<?php echo $linha['complemento']; ?>" data-whatevercep="<?php echo $linha['cep']; ?>" data-whatevercidade="<?php echo $linha['cidade']; ?>" data-whateveruf="<?php echo $linha['uf']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whatevercelular="<?php echo $linha['celular']; ?>" data-whatevercpf="<?php echo $linha['cpf']; ?>" data-whateveridt="<?php echo $linha['idt']; ?>" data-whatevernascimento="<?php echo $nascimento; ?>" data-whateveroperador="<?php echo $linha['criado_por']; ?>" data-whateversituacao="<?php echo $situacao; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro; ?>" data-whateveralterado_por="<?php echo $alterado_por; ?>" data-whateverultima_alteracao="<?php echo $ultima_alteracao; ?>">

								                        <i class="far fa-eye text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar"></i>
								                    </a>
								                </td>

								                <td class="text text-center">
								                    <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editarCliente" data-whatever="<?php echo $linha['id']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateveremail="<?php echo $linha['email']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whateverrua="<?php echo ucwords(strtolower($linha['rua'])); ?>" data-whatevernumero="<?php echo $linha['numero']; ?>" data-whateverbairro="<?php echo $linha['bairro']; ?>" data-whatevercomplemento="<?php echo $linha['complemento']; ?>" data-whatevercep="<?php echo $linha['cep']; ?>" data-whatevercidade="<?php echo $linha['cidade']; ?>" data-whateveruf="<?php echo $linha['uf']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whatevercelular="<?php echo $linha['celular']; ?>" data-whatevercpf="<?php echo $linha['cpf']; ?>" data-whateveridt="<?php echo $linha['idt']; ?>" data-whatevernascimento="<?php echo $nascimento; ?>" data-whateveroperador="<?php echo $linha['criado_por']; ?>" data-whateversituacao="<?php echo $linha['situacao']; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro ?>" data-whateveralterado_por="<?php echo $alterado_por; ?>" data-whateverultima_alteracao="<?php echo $ultima_alteracao; ?>">

								                        <i class="far fa-edit text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>
								                </td>
								                <td class="text text-center">
								                    <a href="processa_excluir_clientes.php?id=<?php echo $linha['id']; ?>" onClick="return confirm('Deseja realmente deletar o cliente?')">
								                        <i class="far fa-trash-alt text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir"></i></a>
								                </td>

								            </tr>
								        </tbody>
								    <?php } ?>
								</table>

<!-- ================================== MODAL CADASTRAR CLIENTE----------------------------------------------------------------->
					<style>
					    .errorInput {
					        border: 2px solid red !important;
					    }
					</style>

					<?php
					include('funcoes_mascaras.php');
					?>

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


					<?php
						include('modal_visualizar_clientes.php');
					?>

					<?php
						include('modal_editar_clientes.php');
					?>


					<script>
					    $(document).ready(function() {
					        $(function() {
					            //Pesquisar os cursos sem refresh na página
					            $("#pesquisa_cliente").keyup(function() {

					                var pesquisa_cliente = $(this).val();

					                //Verificar se há algo digitado
					                if (pesquisa_cliente != '') {
					                    var dados = {
					                        palavra: pesquisa_cliente
					                    }
					                    $.post('busca_clientes.php', dados, function(retorna) {
					                        //Mostra dentro da ul os resultado obtidos
					                        $(".resultado_cliente").html(retorna);
					                    });
					                } else {
					                    $(".resultado_cliente").html('');
					                }
					            });
					        });

					    });
					</script>

								</div>
							</div>
						</div>
			<!--	</div>  -->

				</div>
			</main>
			
			<footer class="footer">
			<?php
				include ('footer.php');
			?>
			</footer>
		</div>
	</div>



</body>

</html>