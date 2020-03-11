<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listagem de usuários</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/5dbe1cd70f.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container" style="margin-top: 40px">
<h3>Lista de usuários</h3>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome do usuário</th>
      <th scope="col">E-mail</th>
      <th scope="col">Nível</th>
      <th scope="col">Status</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
    
     <?php
     include 'conexao.php';
     $sql = "SELECT * FROM `usuario` ";
     $busca  = mysqli_query($conexao, $sql);

     while ($array = mysqli_fetch_array($busca)) {
     	$idUser = $array['idUser'];
     	$nameUser = $array['nameUser'];
      $emailUser = $array['emailUser'];
      $nivelUser = $array['nivelUser'];
      $status = $array['status'];
     ?>
     <tr>
     <td><?php echo $nameUser ?></td>
     <td><?php echo $emailUser ?></td>
     <td><?php echo $nivelUser ?></td>
     <td><?php echo $status ?></td>
     <td><a class="btn btn-success bt-sm" onclick="alert('Administrador cadastrado com sucesso')" style="color: #FFF" href="_aprovar_usuario.php?id=<?php echo $idUser ?>&nivel=1" role="button"><i class="fas fa-users-cog"></i>&nbsp;Administrador</a>
      <a class="btn btn-warning bt-sm" onclick="alert('Funcionário cadastrado com sucesso')" style="color: #FFF" href="_aprovar_usuario.php?id=<?php echo $idUser ?>&nivel=2" role="button"><i class="far fa-id-badge"></i>&nbsp;Funcionário</a>
  <a class="btn btn-danger bt-sm" onclick="alert('Usuário deletado com sucesso')" style="color: #FFF" href="deletarUsuario.php?id=<?php echo $idUser ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
</td>
 	</tr>
 <?php } ?>
    
    
</table>
<div style="text-align: right;">
      <a href="menu.php" role="button" class="btn btn-sm btn-primary">Voltar</a>   
 </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>