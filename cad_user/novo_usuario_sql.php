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

    if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") OR
        ($_SESSION['usuarioNiveisAcessoId'] == "255")) { 


    date_default_timezone_set('America/Sao_Paulo');    
    $nome = $_POST['nome']; 
    $created = date('d/m/Y H:i:s');
    $email = $_POST['email']; 
    $situacoe_id = $_POST['situacoe_id'];
    $niveis_acesso_id = $_POST['niveis_acesso_id'];
    $senha = md5($_POST['senha']);

    if(($niveis_acesso_id > $_SESSION['usuarioNiveisAcessoId']) OR (($_SESSION['usuarioNiveisAcessoId'] == "1") OR
    ($_SESSION['usuarioNiveisAcessoId'] == "255") )) {

        if((isset($_POST['email'])) ){
            $usuario = mysqli_real_escape_string($conn, $_POST['email']);
            $result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' ";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $resultado = mysqli_fetch_assoc($resultado_usuario);
            
            if(isset($resultado)){
                echo '
                    <link rel="stylesheet" href="../css/bootstrap.min.css">
                    <link rel="stylesheet" href="../css/bootstrap.css">    
                    <link rel="stylesheet" href="../css/estilo.css">   
                    <div class="container">
                        <div class="container-fluid">                               
                            <div class="alert alert-warning text-center h4" role="alert">
                                <mark>Usuario</mark> já cadastrado!
                            </div>
                        </div>
                    </div>        
                    ';
            }else{
                $sql = "INSERT INTO usuarios (nome, email, senha, situacoe_id, niveis_acesso_id, created) VALUES
                ('$nome','$email','$senha','$situacoe_id','$niveis_acesso_id','$created');";
                try {
                    $conn->query($sql);
                    echo '
                    <link rel="stylesheet" href="../css/bootstrap.min.css">
                    <link rel="stylesheet" href="../css/bootstrap.css">    
                    <link rel="stylesheet" href="../css/estilo.css">   
                    <div class="container">
                        <div class="container-fluid">                               
                            <div class="alert alert-success text-center h4" role="alert">
                                Registro realizado com sucesso!
                            </div>
                        </div>
                    </div>        
                    ';
                } catch (Exception $e) { 
                    echo '<link rel="stylesheet" href="../css/bootstrap.min.css">
                        <link rel="stylesheet" href="../css/bootstrap.css">    
                        <link rel="stylesheet" href="../css/estilo.css">   
                        <div class="container">
                            <div class="container-fluid">                               
                                <div class="alert alert-danger text-center h4" role="alert">
                                    Não foi possivel realizar o cadastro!
                                </div>
                            </div>
                        </div>';
                    } 
                }   
        }
    }else{
        $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
                                <link rel="stylesheet" href="../css/bootstrap.css">    
                                <link rel="stylesheet" href="../css/estilo.css">   
                                <div class="container">
                                    <div class="container-fluid">                               
                                        <div class="alert alert-danger text-center h4" role="alert">
                                            <strong>Você não pode cadastrar um usuário </br>
                                                    com permissões superiores ou iguais as suas permissões!
                                            </strong>
                                        </div>
                                    </div>
                                </div>';

                                echo "<script>
                                        function Redireciona(){
                                        self.location = 'novo_usuario.php'
                                        }
                                        self.setTimeout('Redireciona()', 1)
                                     </script>";
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