<?php

include 'conexao.php';
 $programacao = filter_input(INPUT_POST, 'txtCK', FILTER_SANITIZE_SPECIAL_CHARS);
 echo $sql = "INSERT INTO `programacao`(`programacao`) VALUES ('$programacao')";
 $inserir = mysqli_query($conexao,$sql);
 header("Location: listaProgramacao.php");
?>

