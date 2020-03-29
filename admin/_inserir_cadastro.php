<?php
include 'conexao.php';
include 'script/password.php';

$nameUser = $_POST['nameUser'];
$emailUser = $_POST['emailUser'];
$senhaUser = $_POST['senhaUser'];
$encripto = sha1($senhaUser);
$status =  'ATIVO';
$nivel = 1;
echo $sql = "INSERT INTO `usuario`(`nameUser`, `emailUser`, `senhaUser`, `status`,`nivelUser`) VALUES ('$nameUser','$emailUser','$encripto','$status',$nivel)";

$inserir = mysqli_query($conexao,$sql);


header("Location:login.php");

?>
