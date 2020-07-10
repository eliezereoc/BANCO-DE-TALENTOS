<?php
    require_once '../config.php'; 
    require_once(DBAPI);

    $candidatos = null;
    $candidato = null;
    
    //Listagem de candidatos
    function listar() {
        global $candidatos;
        $candidatos = busca_all('candidatos');
    }

   
    //Cadastro de candidatos
    function add() {
        if (!empty($_POST['candidato'])) {
            date_default_timezone_set('America/Sao_Paulo');
            $candidato = $_POST['candidato'];            
            $candidato['data_cadastro'] =  date('d/m/Y H:i:s');
            save('candidatos', $candidato);
            header("Refresh: 3; listar.php");
        }
    }

    //Visualização de um candidato
    function visualiza($id = null) {
        global $candidato;
        $candidato = busca('candidatos', $id);
    }

    //Exclusão de um candidato
    function delete($id = null) {
        global $candidato;
        $candidato = remove('candidatos', $id);
        header('location: listar.php');
    }

    //Atualizacao/Edicao de candidato
    function edit() {
        // date_default_timezone_set('America/Sao_Paulo');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if($id){
                if (isset($_POST['candidato'])) {
                    $candidato = $_POST['candidato'];
                    // $candidato['data_alteracao'] = date('d/m/Y H:i:s');
                    update('candidatos', $id, $candidato);
                    //header('location: index.php');
                    header("Refresh: 3; visualizar_curriculo.php");
                } else {
                    global $candidato;
                    $candidato = busca('candidatos', $id);
                }
            }else{
                $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
                                        <link rel="stylesheet" href="../css/bootstrap.css">    
                                        <link rel="stylesheet" href="../css/estilo.css">   
                                        <div class="container">
                                            <div class="container-fluid">                               
                                                <div class="alert alert-danger text-center h4" role="alert">
                                                    <strong>Não existe dados para ser editado!</strong>
                                                </div>
                                            </div>
                                        </div>';
                // header('location: index.php');
            }


        } else {
            header('location: index.php');
        }
    }



    function editar_usuario() {
        // date_default_timezone_set('America/Sao_Paulo');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if($id){
                global $candidato;
                $candidato = busca('candidatos', $id);
            }else{
                $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
                                        <link rel="stylesheet" href="../css/bootstrap.css">    
                                        <link rel="stylesheet" href="../css/estilo.css">   
                                        <div class="container">
                                            <div class="container-fluid">                               
                                                <div class="alert alert-danger text-center h4" role="alert">
                                                    <strong>Não existe dados para ser editado!</strong>
                                                </div>
                                            </div>
                                        </div>';
                // header('location: index.php');
            }


        } else {
            header('location: index.php');
        }
    }

?>