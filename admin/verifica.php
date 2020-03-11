<?php
include 'conexao.php';
include 'script/password.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = "SELECT idUser, emailUser, senhaUser FROM usuario WHERE emailUser = '$email'";
$buscar = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($buscar);

while($array = mysqli_fetch_array($buscar)){
    $pass = $array['senhaUser'];

 $senhaDeco = sha1($senha);

    if($total > 0){
       if($senhaDeco == $pass){   
        session_start();
           ob_start();
        $_SESSION['usuario'] = base64_encode($array['idUser']);
         if(isset($_SESSION['usuario']) && (!empty($_SESSION['usuario']))){
            header("Location: index");
            echo "<br>"."Parabens";
             exit();
             die();
         }
       }else{
           header("Location: 404");
       }

    }else{
        header("Location: 404");
    }
}
if($total > 0){

}
else{
    header("Location: 404");
}
?>