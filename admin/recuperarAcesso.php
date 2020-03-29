<!DOCTYPE html>
<html>

<head>
    <title>Recuperação de acesso</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/ifpr.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/estiloFade.css" rel="stylesheet">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/ifpr.jpg" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title">
                        Recuperar Acesso
                    </span>
                    <div class="wrap-input100 validate-input" id="email"
                        data-validate="O e-mail tem que ser: fulano@exemplo.com">
                        <input class="input100" type="text" name="email" placeholder="E-mail" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validade="Digite a senha">
                        <input class="input100" id="validar" type="password" name="senha" placeholder="Senha">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validade="Repita a senha">
                        <input class="input100" type="password" name="senha2" placeholder="Repita a senha"
                            oninput="validaSenha(this)">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <?php 
                    include 'conexao.php';
                    if(isset($_POST['email'])){
                    $email = $_POST['email'];
                    $sql = "SELECT * FROM  `usuario` WHERE emailUser = '$email'";
                    $busca = mysqli_query($conexao, $sql);
                    $resultado = mysqli_num_rows($busca);
                    if($resultado > 0){
                            if(isset($_POST['senha'])){
                                $senha = $_POST['senha'];
                                $email = $_POST['email'];
                                $senhaEncri = sha1($senha);
                                $sql2 = "UPDATE `usuario` SET senhaUser = '$senhaEncri' WHERE emailUser = '$email'";
                                $busca2 = mysqli_query($conexao,$sql2);
                                header("Location: login.php");
                              }
                            }else{
                                echo '<div class= "alert alert-danger text-center" style="margin-top: 20px;" role="alert"> E-mail informado não foi encontrado ;-; </div>';             
                                }
                        }
                ?>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Recuperar
                        </button>
                    </div>
                    </a>
            </div>
            </form>
        </div>
    </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>

</html>