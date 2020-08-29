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
    <div class="container">
        <div class="row">
        <div style = "margin-top: 40px;">
        <h3 class="display-2">Anais evento 2017</h3>
        <hr class="mt-2 mb-5">
        <h4 style="margin-top: 30px;" class="display-5">Artigos</h4>
        <hr class="mt-2 mb-5">
        <?php
        include 'conexao.php';
        $sql = "SELECT * FROM `trabalho` WHERE ano= 2017 and tipo='Artigo'";
        $busca = mysqli_query($conexao, $sql);
        $total = mysqli_num_rows($busca);
        if($total > 0){

        }else{
            echo '<div style="text-align: center;"><p>Nenhum artigo encontrado ;-;</p></div>';
        }
        while($array = mysqli_fetch_array($busca)){
            $idTrab = $array['idTrab'];
            $titulo = $array['titulo'];
            $autores = $array['autores'];
            $link = $array['link'];
            $ano = $array['ano'];
            $tipo = $array['tipo'];
        ?>
        <div class="container">
        <div class="row">
        <p style="margin-top: 20px;"><a href="<?php echo $link ?>"><?php echo $titulo?></a><br>
        <span><?php echo $autores ?></span></p>
        </div>
        </div>
        <?php } ?>
        <div style = "margin-top: 40px;">
        <h3 style="margin-top: 20px;">Resumos</h3>
        <hr class="mt-2 mb-5">
        <?php
        include 'conexao.php';
        $sql = "SELECT * FROM `trabalho` WHERE ano= 2017 and tipo='Resumo'";
        $busca = mysqli_query($conexao, $sql);
        $total = mysqli_num_rows($busca);
        if($total > 0){

        }else{
            echo '<div style="text-align: center;"><p>Nenhum resumo encontrado ;-;</p></div>';
        }
        while($array = mysqli_fetch_array($busca)){
            $idTrab = $array['idTrab'];
            $titulo = $array['titulo'];
            $autores = $array['autores'];
            $link = $array['link'];
            $ano = $array['ano'];
            $tipo = $array['tipo'];
        ?>
        <div class="container">
        <div class="row">
        <p style="margin-top: 20px;"><a href="<?php echo $link ?>"><?php echo $titulo?></a><br>
        <span><?php echo $autores ?></span></p>
        </div>
        </div>
        <?php } ?>
        </div>
      </div>
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