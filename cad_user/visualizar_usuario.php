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
    require_once(DBAPI);
    $usuario = busca('usuarios', $_GET['id']);
    include(HEADER_TEMPLATE);
    
    if($usuario['situacoe_id'] == 1)$situacao_atual = "Ativo";
    else $situacao_atual = "Inativo";   
    if($usuario['niveis_acesso_id'] == 1)$niveis_atual = "Administrador";
    if($usuario['niveis_acesso_id'] == 2)$niveis_atual = "Colaborador";
    if($usuario['niveis_acesso_id'] == 3)$niveis_atual = "Usuário";
    if($usuario['niveis_acesso_id'] == 4)$niveis_atual = "Rotariano";
    
?>

    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
            OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { ?>

        <div class="container">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2><strong>Visualiza Usuário</strong></h2>
                </div>
            </div>
            <hr />
            
            <ul class="list-group">
                <li class="list-group-item active bg-info"> <strong>ID Usuário: </strong><?php echo $usuario['id']; ?></li>
                <li class="list-group-item "><strong>Nome: </strong><p class="fonteMaiuscula"><?php echo $usuario['nome']; ?></p></li>
                <li class="list-group-item"><strong>E-mail: </strong> <p><?php echo $usuario['email']; ?></p></li>
                <li class="list-group-item"><strong>Situação do Usuário: </strong> <p><?php echo $situacao_atual; ?></p></li>
                <li class="list-group-item"><strong>Nivel de Acesso: </strong> <p><?php echo $niveis_atual; ?></p></li>
                <li class="list-group-item"><strong>Cadastrado em: </strong> <p><?php echo $usuario['created']; ?></p></li>
                <li class="list-group-item"><strong>Ultima Atualização: </strong> <p><?php echo $usuario['modified']; ?></p></li>
            </ul>

            <hr>
            
            <div class="form-group">
            <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
                OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { ?>

                    <a class="btn btn btn-outline-success" href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
               
                <?php } ?>
                <a class="btn btn btn-outline-secondary" href="listar_usuario.php"> Voltar</a>
            </div>

            </div>
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