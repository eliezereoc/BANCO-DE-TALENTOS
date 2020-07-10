<?php
	session_start();		
	include_once("conexao.php");//Incluindo a conexão com banco de dados	

	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		$result_sys = "SELECT * FROM mastersistema";
		$resultado_sys = mysqli_query($conn, $result_sys);
		$resultado_status = mysqli_fetch_assoc($resultado_sys);
		if(isset($resultado_status)){
			$_SESSION['STATUS_DO_SISTEMA'] = $resultado_status['status_sistema'];
		}
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioSituacaoId'] = $resultado['situacoe_id'];
			$_SESSION['usuarioEmail'] = $resultado['email'];

			if($_SESSION['usuarioSituacaoId'] == "1") { 
				header("Location: ../");
			} else{
			  				
				echo '
					<link rel="stylesheet" href="../css/bootstrap.min.css">
					<link rel="stylesheet" href="../css/bootstrap.css">    
					<link rel="stylesheet" href="../css/estilo.css">   
					<div class="container">
						<div class="container-fluid">                               
							<div class="alert alert-danger text-center h4" role="alert">
							ATENÇÃO, seu usuario esta inativo!
							</div>
						</div>
					</div> 
					
					<script>
						function Redireciona(){
						self.location = "../login/sair.php"
						}
						self.setTimeout("Redireciona()", 2000)
					</script>
					
			  	';



				// echo "<script>
				// 		function Redireciona(){
				// 		self.location = 'login/sair.php'
				// 		}
				// 		self.setTimeout('Redireciona()', 2000)
				// 	</script>";  
			
			}
			/*if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: administrativo.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: colaborador.php");
			}else{
				header("Location: cliente.php");
			}*/

		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] =   '<div class="meg-danger-login">
											Usuário ou senha Inválido
										</div>';
			header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = '<div class="meg-danger-login">
									Usuário ou senha Inválido
								  </div>';
		header("Location: index.php");
	}
?>