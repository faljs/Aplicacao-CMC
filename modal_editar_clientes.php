<!-- -----------------------------------MODAL EDITAR CLIENTE----------------------------------------------------------------->
<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="processa_edit_clientes.php" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="recipient-name" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" id="recipient-name" name="nome">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="recipient-email" class="col-form-label">E-mail</label>
                            <input type="email" class="form-control" id="recipient-email" name="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 col-sm-12">
                            <label for="recipient-rua" class="col-form-label">Rua</label>
                            <input type="text" class="form-control" id="recipient-rua" name="rua">
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="recipient-numero" class="col-form-label">Nº</label>
                            <input type="text" name="numero" id="recipient-numero" class="form-control -10">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <label for="recipient-bairro" class="col-form-label">Bairro</label>
                            <input type="text" name="bairro" id="recipient-bairro" maxlength="50" class="form-control">
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <label for="recipient-complemento" class="col-form-label">Complemento</label>
                            <input type="text" name="complemento" id="recipient-complemento" maxlength="50" class="form-control -10">
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="recipient-cep" class="col-form-label">Cep</label>
                            <input type="text" name="cep" id="recipient-cep" maxlength="50" class="form-control">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-cidade" class="col-form-label">Cidade</label>
                            <input type="text" name="cidade" id="recipient-cidade" maxlength="50" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="recipient-uf" class="col-form-label">UF</label>
                            <input type="text" name="uf" id="recipient-uf" maxlength="50" class="form-control -10">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="recipient-telefone" class="col-form-label">Telefone</label>
                            <input type="text" name="telefone" id="recipient-telefone" onkeypress="mask(this, telefone);" onblur="mask(this, telefone);" class="form-control -10">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="recipient-celular" class="col-form-label">Celular</label>
                            <input type="text" name="celular" id="recipient-celular" maxlength="50" onkeypress="mask(this, celular);" onblur="mask(this, celular);" class="form-control -10">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-cpf" class="col-form-label">CPF</label>
                            <input type="text" name="cpf" id="recipient-cpf" maxlength="50" class="form-control">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-rg" class="col-form-label">RG</label>
                            <input type="text" name="rg" id="recipient-rg" maxlength="50" class="form-control -10">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-nascimento" class="col-form-label">Data de Nascimento</label>
                            <input type="text" name="nascimento" id="recipient-nascimento" class="form-control -10">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-operador" class="col-form-label cli">Cadastrado por</label>
                            <input type="text" name="operador" id="recipient-operador" maxlength="50" class="form-control" disabled>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-dataCadastro" class="col-form-label">Data do cadastro</label>
                            <input type="text" class="form-control" id="recipient-dataCadastro" disabled>
                        </div>
                        <div class="col-md-4 col-sm-12">

                            <label for="recipient-situacao" class="col-form-label">Situação</label>
                            <select class="form-control form-select-lg mb-5 select2" name="situacao" id="recipient-situacao" aria-label=".form-select-lg example">
                                <option value="Pendente">Pendente</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                                <option value="Cancelado">Cancelado</option>

                            </select>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-operador" class="col-form-label cli">Alterado por</label>
                            <input type="text" name="alterado_por" id="recipient-alterado_por" maxlength="50" class="form-control" disabled value="<?php echo $_SESSION['usuarioNome'] ?>">
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="recipient-dataCadastro" class="col-form-label">Última Alteração</label>
                            <input type="text" class="form-control" name="ultima_alteracao" id="recipientultima_alteracao" value="<?php echo date('d/m/Y - H:i:s') ?>" disabled>
                        </div>

                    </div>


                    <input type="hidden" name="id" class="form-control" id="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>

            </form>


        </div>
    </div>
</div>
<!-- -----------------------------------SCRIPT MODAL EDITAR CLIENTE----------------------------------------------------------------->
<script type="text/javascript">
    $('#editarCliente').on('show.bs.modal', function(event) {
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
        modal.find('.modal-title').text('EDITAR CLIENTE CÓDIGO: ' + recipient)
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
