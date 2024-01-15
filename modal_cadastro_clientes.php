<!-- ==================================================CSS PARA CADASTRO DE CLIENTE ==================================== -->
<style>
    .modal-xl-custom {
        max-width: 90% !important;
    }
</style>
<!-- ==================================================MODAL CADASTRO DE CLIENTE ==================================== -->
<div class="modal fade" id="cadHospedes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-xl-custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CADASTRO DE CONSCRITOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ALERTA PARA ERRO DE PREENCHIMENTO DE FORMULARIO -->
            <div class="alert alert-danger d-none fade show m-3" role="alert">
                <strong>ERRO!</strong> - <strong>Preencha o campo <span id="campo-erro"></span></strong>!
                <span id="msg"></span>
            </div>

            <div class="modal-body">
                <form method="POST" id="insert_form">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome" class="col-form-label">Nome do Hospede </label>
                            <input type="text" name="nome" id="nome" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="postoGrad" class="col-form-label">Posto/Grad</label>
                            <input type="text" name="postoGrad" id="postoGrad" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pai" class="col-form-label">Pai</label>
                            <input type="text" name="pai" id="pai" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mae" class="col-form-label">Mãe</label>
                            <input type="text" name="mae" id="mae" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="naturalidade" class="col-form-label">Naturalidade</label>
                            <input type="text" name="naturalidade" id="naturalidade" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="idt" class="col-form-label">IDT / RG</label>
                            <input type="text" name="idt" id="idt" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cpf" class="col-form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ativaReserva" class="col-form-label">Ativa/Reserva</label>
                            <input type="text" name="ativaReserva" id="ativaReserva" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="localTrabalho" class="col-form-label">Local Trabalho</label>
                            <input type="text" name="localTrabalho" id="localTrabalho" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input type="email" name="email" id="email" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="rua" class="col-form-label">Rua</label>
                            <input type="text" name="rua" id="rua" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero" class="col-form-label">Nº</label>
                            <input type="text" name="numero" id="numero" maxlength="50" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="bairro" class="col-form-label">Bairro</label>
                            <input type="text" name="bairro" id="bairro" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="complemento" class="col-form-label">Complemento</label>
                            <input type="text" name="complemento" id="complemento" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cep" class="col-form-label">CEP</label>
                            <input type="text" name="cep" id="cep" maxlength="50" class="form-control border border-warning" onblur="pesquisacep(this.value);">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cidade" class="col-form-label">Cidade</label>
                            <input type="text" name="cidade" id="cidade" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="uf" class="col-form-label">UF</label>
                            <input type="text" name="uf" id="uf" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone" class="col-form-label">Telefone</label>
                            <input type="text" name="telefone" id="telefone" onkeypress="mask(this, 'telefone');" onblur="mask(this, 'telefone');" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="celular" class="col-form-label">Celular</label>
                            <input type="text" name="celular" id="celular" maxlength="50" onkeypress="mask(this, 'celular');" onblur="mask(this, 'celular');" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nascimento" class="col-form-label">Data de Nascimento</label>
                            <input type="text" name="nascimento" id="nascimento" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="operador" class="col-form-label cli">Operador</label>
                            <input type="text" name="operador" id="operador" maxlength="50" class="form-control" disabled value="<?php echo $_SESSION['usuarioNome'] ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="dataCadastro" class="col-form-label">Data do cadastro</label>
                            <input type="text" class="form-control" value="<?php echo date('d/m/Y - H:i:s') ?>" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="situacao" class="col-form-label">Situação</label>
                            <select class="form-control form-select-lg mb-5 select2" name="situacao" id="situacao" aria-label=".form-select-lg example">
                                <option value="Ativa">Ativa</option>
                                <option value="Reserva">Reserva</option>
                            </select>
                        </div>
                    </div>

                    </div>
        <div class="m-2 col-md-8 col-sm-8 alert alert-primary ">
            Informe o CEP e tecle [ ENTER ] para autopreencher o endereço !
        </div>

        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" id="btn-cadastrar">Salvar</button>
            </div>
        </div>
    </div>
        </div>
</div>
    </div>
</div>


     </form>
 </div>