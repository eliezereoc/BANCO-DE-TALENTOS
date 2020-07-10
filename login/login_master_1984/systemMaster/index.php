
<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['usuarioId'])) {  
        session_destroy(); 
        header("Location: ../../");  
        exit;
    }
    $id = $_SESSION['usuarioId'];

   
?>

 



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Sistema EOC Master</title>    

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<?php  if($_SESSION['usuarioNiveisAcessoId'] == "255") { ?>

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2> <strong>Administração Master do Sitemas</strong> </h2>                  
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn btn-outline-secondary btn-sm" href="../../../login/sair.php"><i class="fa fa-arrow-circle-o-left"></i> SAIR</a> 
                </div>                
            </div>
          
            <hr class="hr_1">
            <div class="col-sm-6">
                <h4> <strong>Usuários</strong> </h4>
                <hr class="hr_2">
                <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action"> <a href="../../../cad_user/novo_usuario.php" target="_blank">Cadastrar Usuário</a> </li>
                        <li class="list-group-item list-group-item-action"> <a href="../../../cad_user/listar_usuario.php" target="_blank">Listar Usuário</a> </li>
                        <li class="list-group-item divider"></li>                       
                    </ul>                    
                </div>                
            </div>

            <div class="col-sm-6">
                <h4> <strong>Curriculos</strong> </h4>
                <hr class="hr_2">
                <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action"> <a href="../../../cad_curriculo/novo.php" target="_blank">Cadastrar Curriculos</a> </li>
                        <li class="list-group-item list-group-item-action"> <a href="../../../cad_curriculo/listar.php" target="_blank">Listar Curriculos</a> </li>
                        <li class="list-group-item divider"></li>                       
                    </ul>                    
                </div>                
            </div>

            <div class="col-sm-6">
                <h4> <strong>Status Sistema</strong> </h4>
                <hr class="hr_2">
                <form action="salvaStatus.php" method="post">
                    <div class="form-row"> 
                        <div class="form-group col-sm-6 col-md-6">
                            <label for="status_sistema"> <strong>Status </strong> </label>
                            <select class="select form-control input-sm" name="status_sistema"  >
                                <option value="">  </option>
                                <option value=185>Ativo</option>
                                <option value=0>Inativo</option>				           	
                            </select>
                        </div>
                    </div>

                    <input id="prodId" name="id" type="hidden" value=<?php echo $id ?> >

                    <div class="form-group">               
                        <button type="submit" class="btn btn btn-outline-success">Salvar</button>
                    </div>
                </form>  
               
            </div>
            <hr class="hr_1"> 
        </div>
    </div>



<footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© 2018 Copyright -
        <a href="#"> EOCTecnologia.com.br</a>
    </div>
</footer>

    

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

     
</body>

</html>


<?php 
    }else{ ?>
        <div class="container">
            <div class="container-fluid">
                <div class="alert alert-danger h5 text-center" role="alert">
                   <h1><span>Atenção</span></h1> <br> 
                   <h3>Você não tem permissão para acessar esta seção do sistema!</h3> 
                </div>
            </div>
        </div>    
    <?php   
    }
?>