<?php
session_start();
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
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/ifpr.png" rel="icon">
    <title>Admin- CadastroTrab</title>
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
            <li class="nav-item active">
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
                        <a class="collapse-item" href="cadastroProgramacao.php">Programação</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Tabelas
            </div>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Listas</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listas</h6>
                        <a class="collapse-item active" href="listarTrab">Listar Trabalhos</a>
                        <a class="collapse-item" href="listAno.php">Anos</a>
                        <a class="collapse-item" href="listImagem.php">Imagens</a>
                        <a class="collapse-item" href="listaProgramacao.php">Programação</a>
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
                                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $nome; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="editarUsuario.php?id=<?php echo $id ?>">
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
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trabalhos</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trabalho</li>
                        </ol>
                    </div>

    <div class="container">
        <div style="text-align: center;">
            <h4>Edição de Trabalhos</h4>
        </div>
        <form action="_atualizar_trabalhos.php" method="post" style="margin-top: 20px">
            <?php
		$sql = "SELECT * FROM `trabalho` WHERE idTrab = $id";
		$buscar = mysqli_query($conexao, $sql);
		while ($array = mysqli_fetch_array($buscar)) {
		$idTrab = $array['idTrab'];
        $nameAutor = $array['autores'];
        $titulo = $array['titulo'];
        $link = $array['link'];
        $ano = $array['ano'];
        $tipo = $array['tipo']; 
		?>
            <div class="form-group">
                <label class="control-label">Autores</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo $idTrab ?>">
                <input type="text" class="form-control" name="autor" value="<?php echo utf8_encode($nameAutor)  ?>">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo utf8_encode($titulo)  ?>">
                <label>Link do drive</label>
                <input type="text" class="form-control" name="link" value="<?php echo $link  ?>">

                <label>Ano</label>
                <select class="form-control" name="ano">
                    <option selected disabled>Selecione</option>
                    <?php
                          include 'conexao.php';
                         $sql = "SELECT * FROM ano";
                         $buscar = mysqli_query($conexao,$sql);
                          while ($array = mysqli_fetch_array($buscar)) {
                            $idAno = $array['idAno'];
                            $ano = $array['ano'];
                            ?>
                    <option><?php echo $ano ?></option>
                    <?php } ?>
                </select>
                <label>Tipo</label>
                <select class="form-control" name="tipo">
                    <option selected disabled>Selecione</option>
                    <?php
                          include 'conexao.php';
                         $sql = "SELECT * FROM tipo";
                         $buscar = mysqli_query($conexao,$sql);
                          while ($array = mysqli_fetch_array($buscar)) {
                            $idTipo = $array['idTipo'];
                            $tipo = $array['tipo'];
                            ?>
                    <option><?php echo $tipo ?></option>
                    <?php } ?>
                </select>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
            </div>
    </div>
    <?php } ?>
    </form>
    </div>
    </div>
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