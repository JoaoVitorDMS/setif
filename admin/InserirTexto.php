<?php

include 'conexao.php';
 $autor = $_POST['autor'];
 $titulo = $_POST['titulo'];
 $link = $_POST['link'];
 $ano = $_POST['ano'];
 $tipo = $_POST['tipo'];
 $sql = "INSERT INTO `texto`(`autor`, `titulo`,`link` ,`ano`,`tipo`) VALUES ('$autor','$titulo','$link',$ano,'$tipo')";
 $inserir = mysqli_query($conexao,$sql);
 header("Location: index");
?>

