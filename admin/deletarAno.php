<?php

include 'conexao.php';
$id = $_GET['id'];
$sql = "DELETE FROM `ano` WHERE IdAno = $id";
$deletar = mysqli_query($conexao, $sql);

 header("Location:listAno.php");// redireciona para a pagina aprovarUsuarios.php
?>