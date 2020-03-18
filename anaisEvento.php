<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/ifpr.png" rel="icon">
    <title>Anais Evento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <style type="text/css">
    img {
        max-width: 100%;
        height: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="margin-top: 40px">
        <img src="img/setif.jpeg" alt="Setif">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
                aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Apresentação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscricao.php">Inscrições</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programacao.php">Programação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ensalamento.php">Ensalamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="normasPublicacao.php">Normas de Publicação</a>
                    </li>
                    <li class="nav-item activate">
                        <a class="nav-link active" href="anaisEvento.php">Anais Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="corpoEditorial.php">Corpo Editorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fotosEvento.php">Fotos</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row" style="text-align: center; margin-top: 60px;">
            <div class="col-sm">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                    <label class="control-label">Ano</label>
                    <select class="form-control" name="ano">
                        <option selected disabled value="">Selecione</option>

                        <?php
                          include 'conexao.php';
                         $sql = "SELECT * FROM ano";
                         $buscar = mysqli_query($conexao,$sql);
                          while ($array = mysqli_fetch_array($buscar)) {
                            $idAno = $array['idAno'];
                            $ano = $array['ano'];
                            ?>
                        <option value="<?php echo $ano ?>"><?php echo $ano ?></option>
                        <?php } ?>
                    </select>
            </div>
            <div class="col-sm">
                <label class="control-label">Tipo</label>
                <select class="form-control" name="tipo">
                    <option selected disabled value="">Selecione</option>
                    <?php
                          include 'conexao.php';
                         $sql = "SELECT * FROM tipo";
                         $buscar = mysqli_query($conexao,$sql);
                          while ($array = mysqli_fetch_array($buscar)) {
                            $idTipo = $array['idTipo'];
                            $tipo = $array['tipo'];
                            ?>
                    <option value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm">
                <button type="submit" style="margin-top: 30px; width: 300px" class="btn btn-success ">Filtrar</button>
            </div>
            </form>
        </div>
        <div style="margin-top: 60px;text-align: center;">
            <h4 class="display-2">Artigos</h4>
        </div>
        <div class="row" style="margin-top: 60px;">

            <?php
     include 'conexao.php';
     $sql = "SELECT * FROM `texto` WHERE tipo = 'Artigo' ORDER BY idTrab DESC";
     $busca  = mysqli_query($conexao, $sql);
     while ($array = mysqli_fetch_array($busca)) {
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
                        <p><a href="<?php echo $titulo; ?>"><?php echo $titulo; ?></a></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $ano ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div style="margin-top: 60px;text-align: center;">
            <h4 class="display-2">Resumos</h4>
        </div>
        <div class="row" style="margin-top: 60px;">
            <?php
     include 'conexao.php';
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
     $sql = "SELECT * FROM `texto` WHERE tipo = 'Resumo' ORDER BY idTrab DESC";
     $busca  = mysqli_query($conexao, $sql);
     while ($array = mysqli_fetch_array($busca)) {
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