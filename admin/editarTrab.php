<?php

include 'conexao.php';

$id = $_GET['id'];



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Trabalhos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body style="background-color: #87CEEB; color: #fff">

    <div class="container" style="width: 500px;margin-top: 20px">
        <div style="text-align: center;">
            <h4>Edição de Trabalhos</h4>
        </div>
        <form action="_atualizar_trabalhos.php" method="post" style="margin-top: 20px">
            <?php
		$sql = "SELECT * FROM `texto` WHERE idTrab = $id";
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
                <input type="text" class="form-control" name="autor" value="<?php echo $nameAutor  ?>">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $titulo  ?>">
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