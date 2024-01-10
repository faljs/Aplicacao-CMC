<?php
session_start();
include('config/conexao.php');
include_once("config/seguranca.php");

seguranca_adm();
$consulta = "SELECT * FROM clientes ";
$resultado = mysqli_query($conexao, $consulta);
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <link rel="icon" href="image/perfil.jpg">
    <meta name="theme-color" content="#7952b3"> <!-- #7952b3 -->

    <!-- Bootstrap CSS V4.5.3-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <!-- IMPORTANDO PLUGIN DO SELECT2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />

    <!-- IMPORTANDO PLUGIN DO font-awesome/5.15.3 PARA ICONES VISUALIZAR - EDITAR - EXCLUIR-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- EXTENSÃO PARA ICONES SVG W3C.ORG -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>



<!--------------------------------------------------------CAMPO PARA COLOCAR OS MODAIS------------------------------------------------------------------------------->

<table class="table table-bordered table-hover table-sm table-responsive-xl resultado_cliente">
    <thead>
        <tr class="bg-primary text text-white">

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

            </tr>
        </tbody>
    <?php } ?>
</table>


<!-- -----------------------------------SCRIPT MODAL VISUALIZAR CLIENTE----------------------------------------------------------------->
<script type="text/javascript">
    $('#visulaizarCliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var recipient = button.data('whatever')
        var recipientnome = button.data('whatevernome')
        var recipientemail = button.data('whateveremail')
        var recipienttelefone = button.data('whatevertelefone')
        var recipientrua = button.data('whateverrua')
        var recipientnumero = button.data('whatevernumero')
        var recipientbairro = button.data('whateverbairro')
        var recipientcomplemento = button.data('whatevercomplemento')
        var recipientcep = button.data('whatevercep')
        var recipientcidade = button.data('whatevercidade')
        var recipientuf = button.data('whateveruf')
        var recipienttelefone = button.data('whatevertelefone')
        var recipientcelular = button.data('whatevercelular')
        var recipientcpf = button.data('whatevercpf')
        var recipientrg = button.data('whateverrg')
        var recipientnascimento = button.data('whatevernascimento')
        var recipientoperador = button.data('whateveroperador')
        var recipientsituacao = button.data('whateversituacao')
        var recipientdataCadastro = button.data('whateverdata-cadastro')
        var recipientalterado_por = button.data('whateveralterado_por')
        var recipientultima_alteracao = button.data('whateverultima_alteracao')

        var modal = $(this)
        modal.find('.modal-title').text('VISUALIZAR CLIENTE CÓDIGO: ' + recipient)
        modal.find('#id').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        modal.find('#recipient-email').val(recipientemail)
        modal.find('#recipient-telefone').val(recipienttelefone)
        modal.find('#recipient-rua').val(recipientrua)
        modal.find('#recipient-numero').val(recipientnumero)
        modal.find('#recipient-bairro').val(recipientbairro)
        modal.find('#recipient-complemento').val(recipientcomplemento)
        modal.find('#recipient-cep').val(recipientcep)
        modal.find('#recipient-cidade').val(recipientcidade)
        modal.find('#recipient-uf').val(recipientuf)
        modal.find('#recipient-telefone').val(recipienttelefone)
        modal.find('#recipient-celular').val(recipientcelular)
        modal.find('#recipient-cpf').val(recipientcpf)
        modal.find('#recipient-rg').val(recipientrg)
        modal.find('#recipient-nascimento').val(recipientnascimento)
        modal.find('#recipient-operador').val(recipientoperador)
        modal.find('#recipient-situacao').val(recipientsituacao)
        modal.find('#recipient-dataCadastro').val(recipientdataCadastro)
        modal.find('#recipient-alterado_por').val(recipientalterado_por)
        modal.find('#recipientultima_alteracao').val(recipientultima_alteracao)

    })
</script>

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