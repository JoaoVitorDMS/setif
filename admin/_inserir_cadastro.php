<?php
include 'conexao.php';
include 'script/password.php';

$nameUser = $_POST['nameUser'];
$emailUser = $_POST['emailUser'];
$senhaUser = $_POST['senhaUser'];
$status =  'ATIVO';
$nivel = 1;
$sql = "INSERT INTO `usuario`(`nameUser`, `emailUser`, `senhaUser`, `status`,`nivelUser`) VALUES ('$nameUser','$emailUser',md5(('$senhaUser').rand(1,999)),'$status',$nivel)";

$inserir = mysqli_query($conexao,$sql);


header("Location:log.php");

?>
