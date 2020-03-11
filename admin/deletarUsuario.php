<?php

include 'conexao.php';
$id = $_GET['id'];
$nivel = $_GET['nivelUser'];
$sql = "DELETE FROM `usuario` WHERE IdUser = $id";
$deletar = mysqli_query($conexao, $sql);

 header("Location:aprovarUsuarios.php");// redireciona para a pagina aprovarUsuarios.php
?>