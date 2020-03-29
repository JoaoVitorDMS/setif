<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/ifpr.png" rel="icon">
    <title>Filtro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
    img {
        max-width: 100%;
        height: auto;
    }
    </style>
</head>

<body>
    <img src="img/setif.jpeg" alt="Setif">
    <div class="container" style="margin-top: 40px">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="menu.php">Setif</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Programação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inscrições</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Imagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">

            <?php
     include 'conexao.php';
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if (isset($_POST['ano'])) {
    $_SESSION['ano'] = $_POST['ano'];
    }
    if (isset($_POST['tipo'])) {
    $_SESSION['tipo'] = $_POST['tipo'];
    }
    $ano = $_SESSION['ano'];
    $tipo = $_SESSION['tipo'];
    $sql = "SELECT * FROM `texto` WHERE ano = '". $_SESSION['ano']."' AND tipo = '". $_SESSION['tipo']."' ORDER BY idTrab DESC";
    $busca  = mysqli_query($conexao, $sql);

    $totalDado = mysqli_num_rows($busca);

    $quantidadePag = 20;

    $numPag = ceil($totalDado/$quantidadePag);

    $inicio = ($quantidadePag * $pagina)-$quantidadePag;

    $resu = "SELECT * FROM `texto` WHERE ano = '". $_SESSION['ano']."' AND tipo = '". $_SESSION['tipo']."' ORDER BY idTrab DESC  LIMIT $inicio, $quantidadePag";

    $resultado = mysqli_query($conexao,$resu);
    $totalDado = mysqli_num_rows($resultado);
    if($totalDado > 0){

    }else{
        echo '<center><h4 class="display-2">Nenhum resultado encontrado</h4></center>';
    }

      while ($array = mysqli_fetch_array($resultado)) {
      $idTrab = $array['idTrab'];
      $autor = $array['autores'];
      $titulo = $array['titulo'];
      $ano = $array['ano'];
      $link = $array['link'];
      $tipo = $array['tipo'];

     ?>
            <div class="col-sm-6" style="margin-top: 20px">
                <div class="card text-center">
                    <div class="card-header">
                        <?php echo $tipo ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $autor?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $titulo; ?></h6>
                        <p><a href="https://www.google.com/?gws_rd=ssl">Google</a></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $ano ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php
// Verificar a página anterior e posterior
$paginaAnterior = $pagina-1;
$paginaPosterior = $pagina+1;

?>
        <div style="margin-top: 10px;">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-mg">
                    <li class="page-item">
                        <?php
        if($paginaAnterior != 0){ ?>
                        <a class="page-link" style="background-color: #32CD32;color: white "
                            href="filtro.php?pagina=<?php echo $paginaAnterior; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        <?php } else{ ?>
                        <span class="page-link" style="background-color: #32CD32;color: white "
                            aria-hidden="true">&laquo;</span>
                        <?php }?>
                    </li>
                    <?php
    for($i = 1; $i < $numPag +1; $i++){ ?>
                    <li class="page-item"><a class="page-link" style="background-color: #32CD32;color: white "
                            href="filtro.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                    <?php } ?>
                    <li class="page-item">
                        <?php
        if($paginaPosterior <= $numPag){ ?>
                        <a class="page-link" style="background-color: #32CD32;color: white "
                            href="filtro.php?pagina=<?php echo $paginaPosterior; ?>"" aria-label=" Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        <?php } else{ ?>
                        <span class="page-link" style="background-color: #32CD32;color: white "
                            aria-hidden="true">&raquo;</span>
                        <?php }?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>