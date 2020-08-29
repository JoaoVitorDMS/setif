<?php
session_start();
$r=session_id();
ob_start();
if(!isset($_SESSION['usuario'])|| empty($_SESSION['usuario'])){
    header("Location: login?erro=sem-permissao");
    exit();
    die();
}
if(isset($_GET["sair"])&& $_GET['sair'] == "logout"){
    session_destroy();
    session_unset();
    header("Location: login?logout");
    exit();
    die();
}
include 'conexao.php';
$id = base64_decode($_SESSION['usuario']);
$sql = "SELECT * FROM `usuario` WHERE idUser = $id";
$busca = mysqli_query($conexao, $sql);
$conta = mysqli_num_rows($busca);

if($conta > 0){
}else{
        session_destroy();
    session_unset();
    header("Location: login?erro=usuario-invalido");
    exit();
    die();
}
$pega = mysqli_fetch_array($busca);
$nome = $pega['nameUser'];
$id = $pega['idUser'];
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/ifpr.png" rel="icon">
    <title>Edição de usuário</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="images/ifpr.png">
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    <span>inicio</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Paginas
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                    aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-keyboard"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastros</h6>
                        <a class="collapse-item" href="cadastro.php">Usuário</a>
                        <a class="collapse-item" href="cadastroTrab.php">Trabalho</a>
                        <a class="collapse-item" href="adicionarAno.php">Ano</a>
                        <a class="collapse-item" href="adicionarImagem.php">Imagem</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Tabelas
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Listas</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listas</h6>
                        <a class="collapse-item" href="listarTrab">Listar Trabalhos</a>
                        <a class="collapse-item" href="listAno.php">Anos</a>
                        <a class="collapse-item" href="listImagem.php">Imagens</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-success bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
-                                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $nome; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item active" href="editarUsuario.php?id=<?php echo $id ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Editar
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?sair=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container">
                    <form action="_atualizar_usuario.php" method="post" style="margin-top: 20px">
                        <?php
		$sql = "SELECT * FROM `usuario` WHERE idUser = $id";
		$buscar = mysqli_query($conexao, $sql);
		while ($array = mysqli_fetch_array($buscar)) {
		$idUser = $array['idUser'];
     	$nameUser = $array['nameUser'];
     	$emailUser = $array['emailUser'];
        $nivelUser = $array['nivelUser'];
        $status = $array['status'];
		?>
                        <div class="form-group">
                            <label>Nome do usuário</label>
                            <input type="text" name="nameUser" class="form-control" value="<?php echo $nameUser ?>"
                                autocomplete="off">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $idUser ?>" readOnly>
                            <label>E-mail</label>
                            <input type="text" name="emailUser" class="form-control" value="<?php echo $emailUser ?>"
                                autocomplete="off">
                        </div>
                        <div style="text-align: center; height: 100px;">
                        <a role="button" type="submit" class="btn btn-sm btn-dark" href="recuperarAcesso.php">Alterar a senha</a>
                        </div>
                        <div style="text-align: right; margin-top: -60px;">
                            <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                        </div>
                        <?php } ?>
                    </form>
					</div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy; <script>
                                document.write(new Date().getFullYear());
                                </script> - developed by
                                <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>