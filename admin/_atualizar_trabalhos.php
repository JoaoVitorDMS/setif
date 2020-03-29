<?php
include 'conexao.php';

echo $id = $_POST['id'];
echo $nameAutor = $_POST['autor'];
echo $titulo = $_POST['titulo'];
echo $link = $_POST['link'];
echo $ano = $_POST['ano'];
echo $tipo = $_POST['tipo']; 
echo $sql = "UPDATE `trabalho` SET `titulo`='$titulo',`link`='$link',`autores`='$nameAutor',`ano`=$ano,`tipo`='$tipo' WHERE idTrab = $id";
$atualizar = mysqli_query($conexao, $sql);
header("Location: listarTrab");
?>