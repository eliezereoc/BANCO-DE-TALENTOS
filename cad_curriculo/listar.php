<?php
if (!isset($_SESSION)) session_start();// inicia em cada página diferente
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioId'])) {  
  session_destroy();// Destrói a sessão por segurança  
  header("Location: ../login/"); // Redireciona o visitante de volta pro login
  exit;
}
	// require_once '../login/valida_sessao.php';
	require_once 'func.php'; 
	listar();
	include(HEADER_TEMPLATE);
?>


<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
	OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h2> <strong>Lista Curriculos</strong> </h2>
			</div>
			<div class="col-sm-6 text-right h2">
			<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
				OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
				<a class="btn btn-info btn-sm" href="novo.php"><i class="fa fa-plus"></i> Novo Cadastro</a>
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
		<hr />



		<div div class="table-responsive text-nowrap">
			<table class="table table-striped table-sm table-hover">
				<thead class="table-dark">
					<tr>
						<th class=" actions lead m-1" scope="col">ID</th>
						<th class=" actions lead m-1" scope="col">Nome</th>
						<!-- <th class=" actions lead m-1" scope="col">CPF</th> -->
						<!-- <th class=" actions lead m-1" scope="col">Contato</th> -->
						<th class=" actions lead m-1" scope="col">Pretenção Salarial</th>
						<th class=" actions lead m-1" scope="col">Formação Academica</th>
						<th class=" actions lead m-1" scope="col">Curso</th>
						<th class=" actions lead m-1" style="text-align: center;" scope="col" >Ação</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($candidatos) : ?>
				<?php foreach ($candidatos as $candidato) : ?>
					<tr>
						<th scope="row"><?php echo $candidato['id']; ?></th>
						<td class="fonteMaiuscula"><?php echo $candidato['nome']; ?></td>
						<!-- <td><?php echo $candidato['cpf']; ?></td> -->
						<!-- <td><?php echo $candidato['celular']; ?></td> -->
						<td><?php echo $candidato['pretencao_salario']; ?></td>
						<td><?php echo $candidato['formacaoAcademica']; ?></td>
						<td><?php echo $candidato['curso']; ?></td>
						<td class="actions text-right form-group"  style="vertical-align: middle;  ">
							<div class="btn-group" role="group" aria-label="carrega arquivos">
								<a class="btn btn-info btn-sm" href="visualizar_curriculo.php?id=<?php echo $candidato['id']; ?>" role="button">
									<i class="fa fa-eye fa-1x" aria-hidden="true"></i>
										Visualizar
								</a>
								<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
											OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
									<a class="btn btn-success btn-sm" href="editar_curriculo.php?id=<?php echo $candidato['id']; ?>" role="button">
										<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i>
											Editar
									</a>
								<?php } ?>
								<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  ?>
									<a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $candidato['id']; ?>" role="button" data-toggle="modal" data-target="#delete-modal" data-candidato="<?php echo $candidato['id']; ?>">
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
    }else{ 
        
		if(($_SESSION['usuarioNiveisAcessoId'] == "3")){
                 
                       //header("Refresh: 3; listar.php");
				echo "<script>
					function Redireciona(){
						self.location = 'index.php'
					}
					self.setTimeout('Redireciona()', 2000)
				</script>";


			//header("Location: index.php");
		}else{?>
        <div class="alert alert-danger h5 text-center" role="alert">
            Atenção, você não tem permissão para acessar esta seção do sistema!
        </div>
		
		<?php }  
    }
?>


<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>