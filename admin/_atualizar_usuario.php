<?php
include 'conexao.php';

echo $id = $_POST['id'];
echo $nameUser = $_POST['nameUser'];
echo $emailUser = $_POST['emailUser'];

echo $sql = "UPDATE `usuario` SET `nameUser`='$nameUser',`emailUser`='$emailUser' WHERE idUser = $id";
$atualizar = mysqli_query($conexao, $sql);
header("Location: index.php");
?>