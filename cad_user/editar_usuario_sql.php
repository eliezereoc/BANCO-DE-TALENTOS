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
    require_once DBAPI; 
    $conn = open_database();

if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
 OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { 
 
    date_default_timezone_set('America/Sao_Paulo');    
    $id = $_GET['id']; 
    $nome = $_POST['nome']; 
    $modified = date('d/m/Y H:i:s');
    $email = $_POST['email']; 
    $situacoe_id = $_POST['situacoe_id'];
    $niveis_acesso_id = $_POST['niveis_acesso_id'];
    $senha = md5($_POST['senha']);

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', modified = '$modified', 
    situacoe_id = '$situacoe_id' , niveis_acesso_id = '$niveis_acesso_id', senha = '$senha'
    WHERE id='$id'";
    
    try {
        $conn->query($sql);
        echo '
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/bootstrap.css">    
            <link rel="stylesheet" href="../css/estilo.css">   
            <div class="container">
                <div class="container-fluid">                               
                    <div class="alert alert-success text-center h4" role="alert">
                        Registro atualizado com sucesso!
                    </div>
                </div>
            </div>        
        ';
      } catch (Exception $e) { 
        echo '
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <link rel="stylesheet" href="../css/bootstrap.css">    
                <link rel="stylesheet" href="../css/estilo.css">   
                <div class="container">
                    <div class="container-fluid">                               
                        <div class="alert alert-danger text-center h4" role="alert">
                            Não foi possivel atualizar o cadastro!
                        </div>
                    </div>
                </div>        
            ';
      } 

      
    }else{ 
        echo '
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">    
        <link rel="stylesheet" href="../css/estilo.css">   
        <div class="container">
            <div class="container-fluid">                               
                <div class="alert alert-danger text-center h4" role="alert">
                Atenção, você não tem permissão para acessar esta seção do sistema!
                </div>
            </div>
        </div>        
        ';
           
    }


    close_database($conn);
    
    echo "<script>
            function Redireciona(){
              self.location = 'listar_usuario.php'
            }
            self.setTimeout('Redireciona()', 2000)
          </script>";

?>




    
