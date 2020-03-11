<?php
include 'conexao.php';

$id = $_GET['id'];
$nivel = $_GET['nivel'];

//administrador
if($nivel == 1){

	$update = "UPDATE `usuario` SET status = 'Ativo', nivelUser = 1 WHERE idUser = $id";
	$sql = mysqli_query($conexao,$update);
}
//funcionário
if($nivel == 2){

	$update = "UPDATE `usuario` SET status = 'Ativo', nivelUser = 2 WHERE idUser = $id";
	$sql = mysqli_query($conexao,$update);
	
}
header("Location:aprovarUsuarios.php");
?>
