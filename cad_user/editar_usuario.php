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
    $id = $_GET['id'];
    $usuario = busca('usuarios', $id);
    $niveis_acessos = busca_all('niveis_acessos');
    include(HEADER_TEMPLATE);

    $senha_atual = md5($usuario['senha']);
     
   /* if($usuario['situacoe_id'] == 1)$situacao_atual = "Ativo";
    else $situacao_atual = "Inativo";   
    if($usuario['niveis_acesso_id'] == 1){
        $niveis_atual = "Administrador";
    }else{
        if($usuario['niveis_acesso_id'] == 2)$niveis_atual = "Colaborador";
        else $niveis_atual = "Usuário";
    }*/  
    
?>

<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
 OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { ?>

<div class="container">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm-6">
				<h2> <strong>Atualizar Usuário</strong> </h2>
			</div>
		</div>	
        <?php            
            if(!empty($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
        <hr id="hr_1">
        <form action="editar_usuario_sql.php?id=<?php echo $usuario['id']; ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome"> <strong> Nome</strong> </label>
                    <input type="text" class="form-control " name="nome" value="<?php echo $usuario['nome']; ?>" required="required" >
                </div>
                <div class="form-group col-md-2">
                    <label for="created"> <strong> Data Cadastro </strong> </label>
                    <input type="text" class="form-control" name="created" value="<?php echo $usuario['created']; ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="modified"> <strong> Data Atualização </strong> </label>
                    <input type="text" class="form-control" name="modified" value="<?php echo $usuario['modified']; ?>" disabled>
                </div>

                <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { ?>
                    <div class="form-group col-md-8">
                        <label for="email"> <strong>E-mail </strong> </label>
                        <input type="email" class="form-control fonteMinuscula" name="email" value="<?php echo $usuario['email']; ?>" required="required" >
                    </div>
                <?php }else{
                        if($_SESSION['usuarioNiveisAcessoId'] == "2"){?>
                            <div class="form-group col-md-8">
                                <label for="email"> <strong>E-mail </strong> </label>
                                <input type="email" class="form-control fonteMinuscula" name="email" value="<?php echo $usuario['email']; ?>" required="required" readonly>
                            </div>  
                <?php   }
                    }
                    ?>
                            
                <div class="form-group col-md-2">                    
                    <label for="situacoe_id"> <strong>Situação </strong> </label>
                    <select class="select form-control input-sm" name="situacoe_id" required="required" >
                        <option><?php //echo $usuario['situacao_atual']; ?></option>
                        <option value=1>Ativo</option>
                        <option value=2>Inativo</option>				           	
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label class="control-label " for="niveis_acesso_id"> <strong> Nivel Acesso </strong> </label>
                    <select class="select form-control input-sm" name="niveis_acesso_id" required="required">
                        <option value=""><?php //echo $usuario['niveis_atual']; ?> </option>
                        <?php foreach($niveis_acessos as $nivel_acesso) :   ?>
                            <option value="<?php echo $nivel_acesso['id']; ?>"><?php echo $nivel_acesso['nome']; ?></option>
                        <?php endforeach; ?> 
                    </select>
                </div>
            </div>                  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="senha"> <strong> Senha </strong> </label>
                    <input type="password" class="form-control" id="password" name="senha" value="<?php //echo $senha_atual; ?>" placeholder="Senha" required="required" >
                </div>
                
                <div class="form-group col-md-6">
                    <label for="senha"> <strong> Confirma Senha </strong> </label>
                    <input type="password" class="form-control" id="confirm_password" name="senha" value="<?php //echo $senha_atual; ?>" placeholder="Confirma Senha" required="required" >
                </div>
                 
            </div>
            <hr>

            <div class="form-group">
               <a class="btn btn btn-outline-secondary" href="listar_usuario.php"> Voltar</a>
               <button type="submit" class="btn btn btn-outline-success">Salvar</button>
               <a class="btn btn btn-outline-warning" href="listar_usuario.php">Cancela</a>
               
            </div>
        </form>            
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