<?php
  session_start();
  require_once '../config.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Eoc Tecnologia">
  <link rel="icon" href="imagens/favicon.ico">
  <title>Login - EOC</title>

  <link href="<?php echo BASEURL; ?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo BASEURL; ?>css/estilo_login.css" rel="stylesheet">
 


</head>
<body>
  <div class="container">
    
      <form class="form-signin" method="POST" action="valida.php">
        <h2 class="form-signin-heading">Área Restrita</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-success btn-block" type="submit">Acessar</button>
      </form>
        <?php 
          if(isset($_SESSION['loginErro'])){
            echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
          }
        ?>
        <?php 
          if(isset($_SESSION['logindeslogado'])){
            echo $_SESSION['logindeslogado'];
            unset($_SESSION['logindeslogado']);
          }
        ?>
  </div> 




  
</body>
</html>




  