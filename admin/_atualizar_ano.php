<?php
include 'conexao.php';

echo $id = $_POST['id'];
echo $ano = $_POST['ano']; 
echo $sql = "UPDATE `ano` SET `ano`='$ano' WHERE idAno = $id";
$atualizar = mysqli_query($conexao, $sql);
header("Location: listAno");
?>