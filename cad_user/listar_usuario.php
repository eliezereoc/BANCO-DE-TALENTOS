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
	$usuarios = busca_all('usuarios');
	include(HEADER_TEMPLATE);	
?>


<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
    OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { ?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h2> <strong>Lista Usuários</strong> </h2>
			</div>
			<div class="col-sm-6 text-right h2">
			<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
				OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
				<a class="btn btn-info btn-sm" href="novo_usuario.php"><i class="fa fa-plus"></i> Novo Usuário</a>
			<?php } ?>
				<a class="btn btn btn-outline-secondary btn-sm" onClick="history.go(0)"><i class="fa fa-refresh"></i> Atualizar</a>
				<a class="btn btn btn-outline-secondary btn-sm" href="index.php"><i class="fa fa-backward"></i> Voltar</a>
			</div>
		</div>
		<?php
            if(!empty($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
		<hr/>



		<div div class="table-responsive text-nowrap">
			<table class="table table-striped table-sm table-hover">
				<thead class="table-dark">
					<tr>
						<th class=" actions lead m-1" scope="col">ID</th>
						<th class=" actions lead m-1" scope="col">Nome</th>
						<th class=" actions lead m-1" scope="col">E-mail</th>
						<th class=" actions lead m-1" scope="col">Situação</th>
						<th class=" actions lead m-1" scope="col">Data Cadastro</th>
						<th class=" actions lead m-1" scope="col">Data Alteração</th>
						<th class=" actions lead m-1" style="text-align: center;" scope="col" >Ação</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($usuarios) : ?>
				<?php foreach ($usuarios as $usuario) : ?>
				<?php	if($usuario['situacoe_id'] == 1)$situacao_atual = "Ativo";
						else $situacao_atual = "Inativo"; 
				?>
					<tr>

						<th scope="row"><?php echo $usuario['id']; ?></th>
						<td class="fonteMaiuscula"><?php echo $usuario['nome']; ?></td>
						<td><?php echo $usuario['email']; ?></td>
						<td><?php echo $situacao_atual; ?></td>
						<td><?php echo $usuario['created']; ?></td>
						<td><?php echo $usuario['modified']; ?></td>
						<td class="actions text-right form-group"  style="vertical-align: middle;  ">
							<div class="btn-group" role="group" aria-label="carrega arquivos">
								<a class="btn btn-info btn-sm" href="visualizar_usuario.php?id=<?php echo $usuario['id']; ?>" role="button">
									<i class="fa fa-eye fa-1x" aria-hidden="true"></i>
										Visualizar
								</a>
								<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
								OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
									<a class="btn btn-success btn-sm" href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" role="button">
										<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i>
											Editar
									</a>
								<?php } ?>
								<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
									<a class="btn btn-danger btn-sm" href="#" role="button" data-toggle="modal" data-target="#delete-modal" data-usuario="<?php echo $usuario['id']; ?>">
										<i class="fa fa-trash fa-1x" aria-hidden="true"></i>
											Excluir
									</a>
								<?php } ?>
							</div>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="6">Nenhum registro encontrado.</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
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




<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>