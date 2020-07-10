<?php 
if (!isset($_SESSION)) session_start();// inicia em cada página diferente
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioId'])) {  
  session_destroy();// Destrói a sessão por segurança  
  header("Location: ../login/"); // Redireciona o visitante de volta pro login
  exit;
}
    // require_once '../login/valida_sessao.php';
    require_once '../config.php'; 
    include(HEADER_TEMPLATE); 

?>

<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
        OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
    <div class="container">
        <h2><strong>Usuarios</strong></h2>
        <hr />

        <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
        OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>  
            <a class="botao_menu btn btn-secondary" href="novo_usuario.php" role="button" >
                <div class="col-xs-12 text-center"> 
                    <i class="fa fa-file-text fa-3x" aria-hidden="true"></i> 
                </div>
                Novo
            </a>
        <?php } ?>

        <a class="botao_menu btn btn-secondary" href="listar_usuario.php" role="button" >
            <div class="col-xs-12 text-center"> 
                <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i> 
            </div>
            Listar
        </a>   
        <hr>
        <a class="btn btn btn-outline-secondary" href="<?php echo BASEURL; ?>"> Voltar</a>  
    </div>

<?php 
    }else{ ?>
        
        <div class="alert alert-danger h5 text-center" role="alert">
            Atenção, você não tem permissão para acessar esta seção do sistema!
        </div>
		
        <?php   
    }


?>

<?php include(FOOTER_TEMPLATE); ?>