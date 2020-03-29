<?php

include 'conexao.php';
$id = $_GET['id'];
$sql = "DELETE FROM `img` WHERE IdImg = $id";
$deletar = mysqli_query($conexao, $sql);

 header("Location:listImagem.php");// redireciona para a pagina aprovarUsuarios.php
?>