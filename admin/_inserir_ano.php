<?php

include 'conexao.php';
 $ano = $_POST['ano'];
 $sql = "INSERT INTO `ano`(`ano`) VALUES ('$ano')";
$inserir = mysqli_query($conexao,$sql);
header("Location: listAno");
?>