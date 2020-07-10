
<?php
  if (!isset($_SESSION)) session_start();// inicia em cada página diferente
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['usuarioId'])) {  
    session_destroy();// Destrói a sessão por segurança  
    header("Location: ../../login/"); // Redireciona o visitante de volta pro login
    exit;
  }



?>