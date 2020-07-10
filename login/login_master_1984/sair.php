<?php
	session_start();
	// session_destroy();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha']
	);
	
	$_SESSION['logindeslogado'] =  '<div class="meg-succees-login">
										Deslogado com sucesso
									</div>';
	
	header("Location: ../index.php");//redirecionar o usuario para a página de login
?>
 