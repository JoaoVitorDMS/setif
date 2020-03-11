<?php

include 'conexao.php';
 $ano = $_POST['ano'];
 $sql = "INSERT INTO `ano`(`ano`) VALUES ('$ano')";
$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container" style="width: 500px; margin-top: 20px">
<center>
<h4>Categoria cadastrado com sucesso!</h4>
</center>
<div style="padding-top: 20px">
	<center>
<a href="adicionarAno.php" role="button" class="btn btn-sm btn-primary">Cadastrar nova categoria</a>
	</center>
</div>

</div>