
<?php
    include_once("conexao.php");

    $status_sistema = $_POST['status_sistema'];
    $id = $_POST['id'];



    $sql = "UPDATE mastersistema SET status_sistema = '$status_sistema' WHERE id='$id'";

    try {
        $conn->query($sql);
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
              <link rel="stylesheet" href="style.css">
              <div class="container">
                <div class="container-fluid">
                    <div class="alert alert-success text-center h4" role="alert">
                        Status do sistema atualizado com sucesso!
                    </div>
                </div> 
               </div>';
                               
    } catch (Exception $e) { 
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
              <link rel="stylesheet" href="style.css">
              <div class="container">
                <div class="container-fluid">
                    <div class="alert alert-danger text-center h4" role="alert">
                        Não foi possivel atualiza o Status do sistema!
                    </div>
                </div> 
               </div>';
                        
    } 

    close_database($conn);  
    // header("Location: index.php");  
    echo "<script>
            function Redireciona(){
                self.location = 'index.php'
            }
            self.setTimeout('Redireciona()', 2000)
          </script>";        


?>