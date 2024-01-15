<?php
session_start();
include_once('assets/cabecalho.php');
include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");

seguranca_adm();
$consulta = "SELECT * FROM clientes ";
$resultado = mysqli_query($conexao, $consulta);
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!--------------------------------------------------------CAMPO PARA COLOCAR OS MODAIS------------------------------------------------------------------------------->
<?php include_once('assets/menu.php'); ?>
<?php include_once('modal_usuario.php'); ?>
<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 bg-primary justify-content-between p-3">
            LISTA DE ASSOCIADOS HOSPEDES
        </div>
        <div class="col-md-6 bg-primary justify-content-between p-3">
            <div class="form-label-group">

                <input type="text" name="pesquisa_cliente" id="pesquisa_cliente" class="form-control" placeholder="PESQUISAR CLIENTES POR NOME - CPF - RG - NASCIMENTO" required autofocus>

            </div>
        </div>
        <div class="col-md-2 bg-primary  justify-content-between p-3 d-flex"> <!-- para alterar a cor alterar bg-warning ou outro que tenha dentro do bootstrap primeiro link cdn do cabacalho.php -->
            <button type="button" class="btn btn-sm btn-dark " data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cadCliente">NOVO CONSCRITO</button>
            <a class="btn btn-sm btn-dark" href="inicio.php" role="button">Voltar</a>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover table-sm table-responsive-xl resultado_cliente">
    <thead>
        <tr class="bg-dark text text-white">

            <th scope="col">CÓD</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">ENDEREÇO</th>
            <th scope="col">CPF</th>
            <th scope="col">RG</th>
            <th scope="col">NASCIMENTO</th>
            <th scope="col">RESPONSÁVEL</th>
            <th scope="col" class="text text-center" colspan="3">AÇÕES</th>
        </tr>
    </thead>
    <?php
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id_cliente = $linha['id_cliente'];
        $nome = ucwords(strtolower($linha['nome']));
        $telefone = $linha['telefone'];
        $responsavel = $linha['criado_por'];
        $situacao = $linha['situacao'];
        $alterado_por = $linha['alterado_por'];
        $cpf = $linha['cpf'];
        $rg = $linha['rg'];


        // CONVERTENDO DATA/HORA PARA PADRAO PORTUGUES-BR
        $ultima_alteracao = $linha['ultima_alteracao'];
        $ultima_alteracao = date('d/m/Y H:i:s',  strtotime($ultima_alteracao));

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
                <td><?php echo $id_cliente ?></td>
                <td><?php echo ucwords(strtolower($nome)); ?></td>
                <td><?php echo $linha['telefone']; ?></td>
                <td><?php echo $endereco; ?></td>
                <td><?php echo $cpf; ?></td>
                <td><?php echo $rg; ?></td>
                <td><?php echo $nascimento ?></td>
                <td><?php echo $responsavel ?></td>
                <td class="text text-center">

                    <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#visulaizarCliente" data-whatever="<?php echo $linha['id_cliente']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateveremail="<?php echo $linha['email']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whateverrua="<?php echo ucwords(strtolower($linha['rua'])); ?>" data-whatevernumero="<?php echo $linha['numero']; ?>" data-whateverbairro="<?php echo $linha['bairro']; ?>" data-whatevercomplemento="<?php echo $linha['complemento']; ?>" data-whatevercep="<?php echo $linha['cep']; ?>" data-whatevercidade="<?php echo $linha['cidade']; ?>" data-whateveruf="<?php echo $linha['uf']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whatevercelular="<?php echo $linha['celular']; ?>" data-whatevercpf="<?php echo $linha['cpf']; ?>" data-whateverrg="<?php echo $linha['rg']; ?>" data-whatevernascimento="<?php echo $nascimento; ?>" data-whateveroperador="<?php echo $linha['criado_por']; ?>" data-whateversituacao="<?php echo $situacao; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro; ?>" data-whateveralterado_por="<?php echo $alterado_por; ?>" data-whateverultima_alteracao="<?php echo $ultima_alteracao; ?>">

                        <i class="far fa-eye text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar"></i>
                    </a>
                </td>

                <td class="text text-center">
                    <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editarCliente" data-whatever="<?php echo $linha['id_cliente']; ?>" data-whatevernome="<?php echo ucwords(strtolower($linha['nome'])); ?>" data-whateveremail="<?php echo $linha['email']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whateverrua="<?php echo ucwords(strtolower($linha['rua'])); ?>" data-whatevernumero="<?php echo $linha['numero']; ?>" data-whateverbairro="<?php echo $linha['bairro']; ?>" data-whatevercomplemento="<?php echo $linha['complemento']; ?>" data-whatevercep="<?php echo $linha['cep']; ?>" data-whatevercidade="<?php echo $linha['cidade']; ?>" data-whateveruf="<?php echo $linha['uf']; ?>" data-whatevertelefone="<?php echo $linha['telefone']; ?>" data-whatevercelular="<?php echo $linha['celular']; ?>" data-whatevercpf="<?php echo $linha['cpf']; ?>" data-whateverrg="<?php echo $linha['rg']; ?>" data-whatevernascimento="<?php echo $nascimento; ?>" data-whateveroperador="<?php echo $linha['criado_por']; ?>" data-whateversituacao="<?php echo $linha['situacao']; ?>" data-whateverdata-cadastro="<?php echo $data_cadastro ?>" data-whateveralterado_por="<?php echo $alterado_por; ?>" data-whateverultima_alteracao="<?php echo $ultima_alteracao; ?>">

                        <i class="far fa-edit text text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i></a>
                </td>
                <td class="text text-center">
                    <a href="processa_excluir_clientes.php?id_cliente=<?php echo $linha['id_cliente']; ?>" onClick="return confirm('Deseja realmente deletar o cliente?')">
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
include('modal_cadastro_clientes.php');
?>

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