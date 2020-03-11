<?php
include 'conexao.php';
include 'script/password.php';

$nameUser = $_POST['nameUser'];
$emailUser = $_POST['emailUser'];
$senhaUser = $_POST['senhaUser'];
$status =  'ATIVO';
$nivelU = 1;
$sql = "INSERT INTO `usuario`(`nameUser`, `emailUser`, `senhaUser`, `status`,`nivel`) VALUES ('$nameUser','$emailUser',sha1('$senhaUser'),'$status',$nivel)";

$inserir = mysqli_query($conexao,$sql);


header("Location:log.php");

?>
