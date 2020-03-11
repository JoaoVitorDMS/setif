<?php

include 'conexao.php';
$id = $_GET['id'];
$sql = "DELETE FROM `texto` WHERE IdTrab = $id";
$deletar = mysqli_query($conexao, $sql);
header("Location: listarTrab");
?>