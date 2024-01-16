<?php
session_start();
//include_once('assets/cabecalho.php');
//include_once('assets/rodape.php');
include('config/conexao.php');
include_once("config/seguranca.php");
 seguranca_adm();
$consulta = "SELECT * FROM clientes ";
$resultado = mysqli_query($conexao, $consulta);
?>


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

<!-- acesso as sessions podem ser feitas  aqui no menu
verificacao de usuario  -->

<style type="text/css">
		 .sidebar-link {
		  cursor: pointer;
		  transition: all 0.3s ease-in-out;
		}

		.sidebar-link:hover {
		  background-color: #504F53; /* Cor desejada no hover A03B9C9*/ 
		  color: #C8F2F8; /* Cor do texto no hover */
		  transform: scale(1.1); /* Ajuste conforme necessário */
		}

</style>

		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="inicio.php">
          <span class="align-middle">Sistema CMC</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Itens
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="inicio.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dados Iniciais</span>
            </a>
					</li>
<!--
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.html">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>
-->
					<li class="sidebar-item">
						<a class="sidebar-link" href="cadastro_usuario.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Cadastro de Usuário</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="listar_usuario.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Listar Usuário</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="cadastro_cliente.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Cadastro de Cliente</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="listar_clientes.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Listar Clientes</span>
            </a>
					</li>
<!--
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-in.html">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
            </a>
					</li>



					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-up.html">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
            </a>
					</li>
-->

					<li class="sidebar-item">
						<a class="sidebar-link" href="redefinir_senha.php">
              <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Redefinir Senha</span>
            </a>
					</li>
<!--
					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>
-->
					<li class="sidebar-item">
						<a class="sidebar-link" href="sair.php">
              <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Sair</span>
            </a>
					</li>
<!--
					<li class="sidebar-header">
						Tools & Components
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-buttons.html">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.html">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.html">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li>
				</ul>
-->
				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components? Check out our premium version.
						</div>
						<div class="d-grid">
							<a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
