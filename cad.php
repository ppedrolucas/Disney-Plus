<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney plus</title>
    <link rel="stylesheet" href="CSS/style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
</head>
<body class="banner">
    
        <div class="container">
    <div class="formCad formLog">
        <h2 class="title">Cadastre-se</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="camp">
                <input type="text" name="nome" class="pao" placeholder="Digite seu nome*" required>
            </div>
            <div class="camp">
                <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00')" class="pao" placeholder="Informe seu CPF*" required>
            </div>
            <div class="camp">
                <input type="text" name="tel" onkeypress="$(this).mask('(00) 0000-0000')" class="pao" placeholder="Digite número de contato*" required>
            </div>
            <div class="camp">
                <input type="email" name="email" class="pao" placeholder="Digite seu email*" required>
            </div>
            <div class="camp">
                <input type="password" name="senha" onkeypress="$(this).mask('000000')" class="pao" placeholder="Crie uma senha se 6 dígitos*" required>
            </div>
            <button type="submit" name="btnCad" class="btnLog">Cadastrar</button>
        </form>
        
        <a href="login.php" class="pao">Voltar para o login</a>
        <?php
        
        include('config/conexao.php');
        if(isset($_POST['btnCad'])){
            $nome=$_POST['nome'];
            $cpf=$_POST['cpf'];
            $tel=$_POST['tel'];
            $email=$_POST['email'];
            $senha=$_POST['senha'];
            $cadastro="INSERT INTO tbusers(nameUser,cpfUser,telUser,emailUser,senhaUser) VALUES(:nome,:cpf,:tel,:email,:senha)";                   
            try {
              $result = $conect->prepare($cadastro);
              $result->bindParam(':nome',$nome, PDO::PARAM_STR);
              $result->bindParam(':cpf',$cpf, PDO::PARAM_STR);
              $result->bindParam(':tel',$tel, PDO::PARAM_STR);
              $result->bindParam(':email',$email, PDO::PARAM_STR);
              $result->bindParam(':senha',$senha, PDO::PARAM_STR);
              $result->execute();

              $contar=$result->rowCount();
              if($contar > 0){
                    echo ' <h5>OK!</h5>
                              cadastrado realizado com sucesso !!!';
                  }else{
                    echo '<h5>Ops!</h5>
                            algo de errado não está certo !!!';
                  }
              }catch (PDOException $e){
                echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
              }
        }
        
        ?>
    </div>
</div>
    
    
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/jQuery-Mask/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script src="js/jquery.validate.js"></script>
</body>
</html>