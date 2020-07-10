<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

    <title>EOC-Tecnologia</title>

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/estilo.css">
    

    
</head>

<body>
      <!-- navbar fixed-top navbar-light bg-light -->
      <!-- navbar navbar-expand-lg navbar-dark  -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark" > <!-- bg-dark -->
          <a class="navbar-brand" href="<?php echo BASEURL; ?>index.php">Olá, <?php echo $_SESSION['usuarioNome'] ?> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Arquivos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php //echo BASEURL; ?>#">--</a>                  
                  <div class="dropdown-divider"></div>                  
                </div>
              </li> -->

              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cadastros
                </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php// echo BASEURL; ?>cad_curriculo/novo.php">Curriculum</a>
                  <div class="dropdown-divider"></div>
                  <?php //if($_SESSION['usuarioNiveisAcessoId'] == "1") { ?>  
                    <a class="dropdown-item" href="<?php //echo BASEURL; ?>cad_user/">Usuário</a>
                    <div class="dropdown-divider"></div>
                  <?php //} ?>
                </div> 
              </li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">             
              <li class="nav-item navbar-right">
                <a class="navbar-brand" href="<?php echo BASEURL; ?>login/sair.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  <span> Sair</span> 
                </a>
              </li> 
            </ul>

          </div>
      </nav>

      <main class="p-3">



