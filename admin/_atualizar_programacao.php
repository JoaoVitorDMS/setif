<?php
include 'conexao.php';

$id = $_POST['id'];
$programacao = filter_input(INPUT_POST, 'programacao', FILTER_SANITIZE_SPECIAL_CHARS);
$sql = "UPDATE `programacao` SET `programacao`='$programacao' WHERE idPro = $id";

$atualizar = mysqli_query($conexao, $sql);
header("Location: listaProgramacao.php");
?>