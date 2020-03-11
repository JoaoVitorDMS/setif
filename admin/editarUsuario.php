<?php

include 'conexao.php';

$id = $_GET['id'];



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Usuário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style="background-color: #87CEEB; color: #fff">

<div class="container" style="width: 500px;margin-top: 20px">
	<div style="text-align: center;">
	<h4>Edição de usuário</h4>
	</div>
<form action="_atualizar_usuario.php" method="post" style="margin-top: 20px">
	<?php
		$sql = "SELECT * FROM `usuario` WHERE idUser = $id";
		$buscar = mysqli_query($conexao, $sql);
		while ($array = mysqli_fetch_array($buscar)) {
		$idFornecedor = $array['idUser'];
     	$nameUser = $array['nameUser'];
     	$emailUser = $array['emailUser'];
        $nivelUser = $array['nivelUser'];
        $status = $array['status'];
		?>
	<div class="form-group">
		<label>Nome do usuário</label>
	<input type="text" name="nameUser" class="form-control" value="<?php echo $nameUser ?>" autocomplete="off" readOnly>
	<input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" readOnly>
	<label>E-mail</label>
	<input type="text" name="emailUser" class="form-control" value="<?php echo $emailUser ?>" autocomplete="off" readOnly>
	<label>Nível de acesso</label>
			<select name="nivelUser" class="form-control">
				<option value="1">Administrador</option>
				<option value="2">Funcionário</option>
			</select>
	<label>Status</label>
	<select name="status" class="form-control">
				<option value="1">INATIVO</option>
				<option value="2">ATIVO</option>
			</select>
</div>
<div style="text-align: right;">
<button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
</div>
<?php } ?>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>