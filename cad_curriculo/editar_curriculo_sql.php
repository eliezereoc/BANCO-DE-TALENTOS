
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
    OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { 
 
        $id= $_POST['id'];
        $nome= $_POST['nome'];
        $cpf= $_POST['cpf'];
        $data_nascimento=$_POST['data_nascimento'];
        $possui_filhos=$_POST['possui_filhos'];
        $qtd_filhos=$_POST['qtd_filhos'];
        $estado_civil=$_POST['estado_civil'];
        $nacionalidade=$_POST['nacionalidade'];
        $possui_deficiencia=$_POST['possui_deficiencia'];
        $qual_deficiencia=$_POST['qual_deficiencia'];
        $endereco=$_POST['endereco'];
        $complemento=$_POST['complemento'];
        $estado_1=$_POST['estado_1'];
        $cidade_1=$_POST['cidade_1'];
        $cep=$_POST['cep'];
        $pais_1=$_POST['pais_1'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone'];
        $celular=$_POST['celular'];
        $temWhatsapp=$_POST['temWhatsapp'];
        $rede_social_1=$_POST['rede_social_1'];
        $rede_social_2=$_POST['rede_social_2'];
        $rede_social_3=$_POST['rede_social_3'];
        $pretencao_salario=$_POST['pretencao_salario'];
        $objetivo=$_POST['objetivo'];
        $pais=$_POST['pais'];
        $estado_2=$_POST['estado_2'];
        $cidade_2=$_POST['cidade_2']; 
        $raio=$_POST['raio'];
        $viajar=$_POST['viajar'];
        $transferencia=$_POST['transferencia'];
        $nivel_1=$_POST['nivel_1'];
        $area_1=$_POST['area_1'];
        $resumo_profissional=$_POST['resumo_profissional'];
        $empresa1=$_POST['empresa1'];
        $segmento1=$_POST['segmento1'];
        $porte1=$_POST['porte1'];
        $data_inicio1=$_POST['data_inicio1'];
        $data_termino1=$_POST['data_termino1'];
        $ultimo_cargo1=$_POST['ultimo_cargo1']; 
        $descricao1=$_POST['descricao1'];
        $empresa2=$_POST['empresa2'];
        $segmento2=$_POST['segmento2'];
        $porte2=$_POST['porte2'];
        $data_inicio2=$_POST['data_inicio2'];
        $data_termino2=$_POST['data_termino2'];
        $ultimo_cargo2=$_POST['ultimo_cargo2'];
        $descricao2=$_POST['descricao2'];
        $empresa3=$_POST['empresa3'];
        $segmento3=$_POST['segmento3'];
        $porte3=$_POST['porte3'];
        $data_inicio3=$_POST['data_inicio3'];
        $data_termino3=$_POST['data_termino3'];
        $ultimo_cargo3=$_POST['ultimo_cargo3'];
        $descricao3=$_POST['descricao3'];
        $formacaoAcademica=$_POST['formacaoAcademica'];
        $instituicao=$_POST['instituicao'];
        $curso=$_POST['curso'];
        $data_inicio_academico=$_POST['data_inicio_academico'];
        $data_termino_academico=$_POST['data_termino_academico'];
        $outras_formacao1=$_POST['outras_formacao1'];
        $instituicao_outras1=$_POST['instituicao_outras1']; 
        $data_inicio_curso1=$_POST['data_inicio_curso1'];
        $data_termino_curso1=$_POST['data_termino_curso1'];
        $outras_formacao2=$_POST['outras_formacao2'];
        $instituicao_outras2=$_POST['instituicao_outras2'];
        $data_inicio_curso2=$_POST['data_inicio_curso2'];
        $data_termino_curso2=$_POST['data_termino_curso2'];
        $outras_formacao3=$_POST['outras_formacao3'];
        $instituicao_outras3=$_POST['instituicao_outras3']; 
        $data_inicio_curso3=$_POST['data_inicio_curso3'];
        $data_termino_curso3=$_POST['data_termino_curso3'];  

        $sql = "UPDATE candidatos SET nome = '$nome', cpf = '$cpf' , data_nascimento = '$data_nascimento',
        possui_filhos = '$possui_filhos', qtd_filhos = '$qtd_filhos', estado_civil = '$estado_civil', nacionalidade = '$nacionalidade',
        possui_deficiencia = '$possui_deficiencia', qual_deficiencia = '$qual_deficiencia', endereco = '$endereco', 
        complemento = '$complemento', estado_1 = '$estado_1', cidade_1 = '$cidade_1', cep = '$cep' , pais_1 = '$pais_1', email = '$email',
        telefone = '$telefone', celular = '$celular', temWhatsapp = '$temWhatsapp', rede_social_1 = '$rede_social_1',
        rede_social_2 = '$rede_social_2', rede_social_3 = '$rede_social_3', pretencao_salario = '$pretencao_salario', objetivo = '$objetivo',
        pais = '$pais', estado_2 = '$estado_2' , cidade_2 = '$cidade_2' , raio = '$raio', viajar = '$viajar', transferencia = '$transferencia', 
        nivel_1 = '$nivel_1', area_1 = '$area_1', resumo_profissional = '$resumo_profissional', empresa1 = '$empresa1', segmento1 = '$segmento1',
        porte1 = '$porte1', data_inicio1 = '$data_inicio1', data_termino1 = '$data_termino1', ultimo_cargo1 = '$ultimo_cargo1' ,
        descricao1 = '$descricao1', empresa2 = '$empresa2', segmento2 = '$segmento2', porte2 = '$porte2', data_inicio2 = '$data_inicio2',
        data_termino2 = '$data_termino2', ultimo_cargo2 = '$ultimo_cargo2', descricao2 = '$descricao2', empresa3 = '$empresa3',
        segmento3 = '$segmento3', porte3 = '$porte3', data_inicio3 = '$data_inicio3', data_termino3 = '$data_termino3',
        ultimo_cargo3 = '$ultimo_cargo3', descricao3 = '$descricao3', formacaoAcademica = '$formacaoAcademica', instituicao = '$instituicao',
        curso = '$curso', data_inicio_academico = '$data_inicio_academico', data_termino_academico = '$data_termino_academico', 
        outras_formacao1 = '$outras_formacao1', instituicao_outras1 = '$instituicao_outras1' , data_inicio_curso1 = '$data_inicio_curso1',
        data_termino_curso1 = '$data_termino_curso1', outras_formacao2 = '$outras_formacao2', instituicao_outras2 = '$instituicao_outras2',
        data_inicio_curso2 = '$data_inicio_curso2', data_termino_curso2 = '$data_termino_curso2', outras_formacao3 = '$outras_formacao3',
        instituicao_outras3 = '$instituicao_outras3', data_inicio_curso3 = '$data_inicio_curso3', data_termino_curso3 = '$data_termino_curso3'
        WHERE id='$id'"; 

        
        try {
            $conn->query($sql);
            $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/bootstrap.css">    
            <link rel="stylesheet" href="../css/estilo.css">   
            <div class="container">
                <div class="container-fluid">                               
                    <div class="alert alert-success text-center h4" role="alert">
                        Curriculo atualizado com sucesso!
                    </div>
                </div>
            </div>';
            
          } catch (Exception $e) { 
                    $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
                                            <link rel="stylesheet" href="../css/bootstrap.css">    
                                            <link rel="stylesheet" href="../css/estilo.css">   
                                            <div class="container">
                                                <div class="container-fluid">                               
                                                    <div class="alert alert-danger text-center h4" role="alert">
                                                    Não foi possivel atualizar o curriculo!
                                                    </div>
                                                </div>
                                            </div>';
          }       
    }else{         
        $_SESSION['message'] = '<link rel="stylesheet" href="../css/bootstrap.min.css">
                                <link rel="stylesheet" href="../css/bootstrap.css">    
                                <link rel="stylesheet" href="../css/estilo.css">   
                                <div class="container">
                                    <div class="container-fluid">                               
                                        <div class="alert alert-danger text-center h4" role="alert">
                                        Atenção, você não tem permissão para acessar esta seção do sistema!
                                        </div>
                                    </div>
                                </div>';
    }

    close_database($conn);

    if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
	    OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  
    
        echo "<script>
                function Redireciona(){
                self.location = 'visualizar_curriculo.php?id=$id'
                }
                self.setTimeout('Redireciona()', 1)
            </script>";
    }else{
        if($_SESSION['usuarioNiveisAcessoId'] == "3"){
            echo "<script>
                    function Redireciona(){
                    self.location = 'visualizar_curriculo.php'
                    }
                    self.setTimeout('Redireciona()', 1)
                </script>";
        }
    }        

 
    

?>




    
