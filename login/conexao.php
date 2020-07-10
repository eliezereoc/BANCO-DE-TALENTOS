<?php
	
	require_once '../config.php'; 
	require_once DBAPI; 
	$conn = open_database();

	
	if(!$conn){
	
		die('<link rel="stylesheet" href="../css/bootstrap.min.css">
			 <link rel="stylesheet" href="../css/bootstrap.css">    
			 <link rel="stylesheet" href="../css/estilo.css">   
			 <div class="container">
				<div class="container-fluid">                               
					<div class="alert alert-danger text-center h4" role="alert">
						Não foi possivel conectar ao Banco de Dados!
					</div>
				</div>
			 </div>        
			 ' . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
	
	
	
?>