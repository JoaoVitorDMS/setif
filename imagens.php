<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/ifpr.png" rel="icon">
    <title>Setif- Imagens</title>
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
                        <a class="nav-link" href="imagens">Imagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div style = "margin-top: 20px;">
        <h4 class="display-4 text-center">Fotos do evento</h4>
        </div>
        <div style="margin-top: 60px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <?php
        include 'conexao.php';
        $controle = 2;
        $controle_slide = 1;
        $result = "SELECT * FROM `IMG` ORDER BY idImg ASC";
        $resultado = mysqli_query($conexao, $result);
        while($linha = mysqli_fetch_assoc($resultado)){ 
            
            if($controle == 2){  ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
            </li><?php
                $controle =1;
            }else{ ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $controle_slide ?>">
                </li><?php
                $controle_slide ++;
            }            
        }
        ?>           
            </ol>
            <div class="carousel-inner" role="listbox">
            <?php
        $controle = 2;
        $result = "SELECT * FROM `IMG` ORDER BY idImg ASC";
        $resultado = mysqli_query($conexao, $result);
        while($linha = mysqli_fetch_assoc($resultado)){ 
            
            if($controle == 2){  ?>
                 <div class="carousel-item active">
                    <img src="admin/uploads/<?php echo $linha['caminho']?>" class="d-block w-100" alt="...">
                </div><?php
                $controle =1;
            }else{ ?>
                    <div class="carousel-item">
                    <img src="admin/uploads/<?php echo $linha['caminho']?>" class="d-block w-100" alt="...">
                </div><?php
            }            
        }
        ?>           
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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