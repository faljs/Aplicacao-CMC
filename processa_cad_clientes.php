<?php
session_start();

include('config/conexao.php');

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$postoGrad = mysqli_real_escape_string($conexao, $_POST['postoGrad']);
$pai = mysqli_real_escape_string($conexao, $_POST['pai']);
$mae = mysqli_real_escape_string($conexao, $_POST['mae']);
$naturalidade = mysqli_real_escape_string($conexao, $_POST['naturalidade']);
$idt = mysqli_real_escape_string($conexao, $_POST['idt']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$ativaReserva = mysqli_real_escape_string($conexao, $_POST['ativaReserva']);
$localTrabalho = mysqli_real_escape_string($conexao, $_POST['localTrabalho']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$rua = mysqli_real_escape_string($conexao, $_POST['rua']);
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
$uf = mysqli_real_escape_string($conexao, $_POST['uf']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$celular = mysqli_real_escape_string($conexao, $_POST['celular']);

// Convertendo a data para o formato do banco de dados
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$nascimento = str_replace("/", "-", $nascimento);
$nascimento = date('Y-m-d', strtotime($nascimento));

$operador = mysqli_real_escape_string($conexao, $_POST['operador']);
$criado_por = $_SESSION['usuarioNome'];
$situacao = mysqli_real_escape_string($conexao, $_POST['situacao']);
$data_cadastro = date('Y-m-d H:i:s');

// Ajuste o nome das colunas de acordo com sua tabela no banco de dados
$altera_cliente = "INSERT INTO clientes (nome, postoGrad, pai, mae, naturalidade, idt, cpf, ativaReserva, localTrabalho, email, rua, numero, bairro, complemento, cep, cidade, uf, telefone, celular, nascimento, operador, criado_por, situacao, data_cadastro) 
VALUES ('$nome', '$postoGrad', '$pai', '$mae', '$naturalidade', '$idt', '$cpf', '$ativaReserva', '$localTrabalho', '$email', '$rua', '$numero', '$bairro', '$complemento', '$cep', '$cidade', '$uf', '$telefone', '$celular', '$nascimento', '$operador', '$criado_por', '$situacao', '$data_cadastro')";

$resposta = mysqli_query($conexao, $altera_cliente);

if ($resposta) {
    $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> CLIENTE CADASTRADO COM SUCESSO &nbsp; <i class='far fa-smile-wink fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                        </div>";
    header('Location: listar_clientes.php');
} else {
    $_SESSION['error'] = "<div class='alert alert-danger alert-dismissible fade show text text-center mb-0' role='alert'>
                                
                                <strong> NÃO FOI POSSÍVEL CADASTRAR O CLIENTE &nbsp; <i class='fas fa-grin-squint-tears fa-2x'></i> </strong> 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>";
    header('Location: listar_clientes.php');
}
?>
