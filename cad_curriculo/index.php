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



<div class="container">
    <h2><strong>Curriculum</strong></h2>
    <hr />

    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
	    OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
        <a class="botao_menu btn btn-secondary" href="novo.php" role="button" >
            <div class="col-xs-12 text-center"> 
                <i class="fa fa-file-text fa-3x" aria-hidden="true"></i> 
            </div>
            Novo
        </a>
    <?php } ?>

    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
	OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
        <a class="botao_menu btn btn-secondary" href="listar.php" role="button" >
            <div class="col-xs-12 text-center"> 
                <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i> 
            </div>
            Listar
        </a>
    <?php }else{
            if(($_SESSION['usuarioNiveisAcessoId'] == "3")){?>
                <a class="botao_menu btn btn-secondary" href="visualizar_curriculo.php" role="button" >
                    <div class="col-xs-12 text-center"> 
                        <i class="fa fa-eye fa-3x" aria-hidden="true"></i> 
                    </div>
                    Visualizar
                </a>
                <a class="botao_menu btn btn-secondary" href="editar_curriculo.php" role="button" >
                    <div class="col-xs-12 text-center"> 
                        <i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i> 
                    </div>
                    Editar
                </a>

        <?php }
         } ?>

    

    <hr>
    <!-- <button type="button" class="btn btn-outline-secondary  btn-sm" onclick="goBack()">Voltar</button> -->
    <a class="btn btn btn-outline-secondary" href="<?php echo BASEURL; ?>/"> Voltar</a>   

</div>

<?php include(FOOTER_TEMPLATE); ?>