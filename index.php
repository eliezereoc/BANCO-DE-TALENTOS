<?php 
    if (!isset($_SESSION)) session_start();// inicia em cada página diferente
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['usuarioId'])) {  
      session_destroy();// Destrói a sessão por segurança  
      header("Location: login/"); // Redireciona o visitante de volta pro login
      exit;
    }
    // require_once 'login/valida_sessao.php';
    require_once 'config.php'; 
    require_once DBAPI; 
    include(HEADER_TEMPLATE); 
    $db = open_database(); 
?>

<?php if ($db) : ?>

    <?php if($_SESSION['STATUS_DO_SISTEMA'] == "185"){   ?> 

        <div class="container">
            <div class="form-group">                  
                <a class="botao_menu btn btn-secondary" href="cad_curriculo/" role="button" >
                    <div class="col-xs-12 text-center"> 
                        <i class="fa fa-file-text fa-3x" aria-hidden="true"></i> 
                    </div>
                    Curriculos
                </a>
                <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
                OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255") ) { ?>
                    <a class="botao_menu btn btn-secondary" href="cad_user/" role="button" >
                        <div class="col-xs-12 text-center"> 
                            <i class="fa fa-user fa-3x" aria-hidden="true"></i> 
                        </div>
                        Usuarios
                    </a>
                <?php } ?>
            </div>   
        </div>
                <?php }else{
            echo   '<div class="container">
                        <div class="container-fluid">
                            <div class="alert alert-danger h5 text-center" role="alert">
                                <h1><span>Atenção</span></h1> <br> 
                                <h3>Você não tem permissão para acessar esta seção do sistema!</h3> 
                            </div>
                        </div>
                    </div>';
                }  ?>   



<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>


 
<?php include(FOOTER_TEMPLATE); ?>





    

     


    

    
    
    


    
