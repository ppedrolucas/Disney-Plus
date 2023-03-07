<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney plus</title>
    <link rel="stylesheet" href="CSS/style-login.css">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
</head>
<body class="banner">
    
        <div class="container">

    <div class="formLog">

        <h2 class="title">Login</h2>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="camp">
                <input type="text" name="nome" class="pao" placeholder="Digite seu nome*" required>
            </div>
            <div class="camp">
                <input type="email" name="email" class="pao" placeholder="Digite seu email*" required>
            </div>
            <div class="camp">
                <input type="password" name="senha" onkeypress="$(this).mask('000000')" class="pao" placeholder="Digite sua senha*" required>
            </div>
            <button type="submit" name="btnLog" class="btnLog">Entrar</button>
        </form>
        <p>Não possui uma conta?</p>
        <a href="cad.php" class="pao">Crie sua conta agora!</a>

        <?php

        include_once('config/conexao.php');
        if(isset($_POST['btnLog'])){
           
            $login=$_POST['email'];
            $senha=$_POST['senha'];

            $select="SELECT * FROM tbusers WHERE emailUser=:emailLogin AND senhaUser=:senhaLogin";
            try {
              $resultLogin = $conect->prepare($select);
              
              $resultLogin->bindParam(':emailLogin',$login, PDO::PARAM_STR);
              $resultLogin->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
              $resultLogin->execute();
  
              $verificar = $resultLogin->rowCount();
              if ($verificar>0) {
                
                $login=$_POST['email'];
                $senha=$_POST['senha'];
                //CRIAR SESSAO »»
               
                $_SESSION['loginUser'] = $login;
                $_SESSION['senhaUser'] = $senha;
  
                echo 'Bem-vindo(a) ao Disney Plus de volta :)';
              
                header("Refresh: 1, home.html?");
              }else{
                echo "Usuário inválido";
              }
            } catch(PDOException $e){
              echo "<strong>ERRO DE LOGIN = </strong>".$e->getMessage();
            }
          }

        ?>

    </div>
</div>
    
    
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/jQuery-Mask/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
</body>
</html>