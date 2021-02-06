<?php

include 'conexao.php';
$id = $_GET['id'];
$sql = "DELETE FROM `programacao` WHERE idPro = $id";
$deletar = mysqli_query($conexao, $sql);
header("Location: listaProgramacao.php");
?>