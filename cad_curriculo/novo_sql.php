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
        OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  

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
    $nome_file = $_POST['file_curriculo'];

    //echo $nome_file;

    $nome_file=$_FILES['file_curriculo']['name'];
    $size=$_FILES['file_curriculo']['size'];
    $type=$_FILES['file_curriculo']['type'];
    $temp=$_FILES['file_curriculo']['tmp_name'];
    $caption1=$_POST['caption'];
    $link=$_POST['link'];

    echo $nome_file; echo '<br>';        

    //if($_FILES['file_curriculo']['size'] != 0){
      //  echo"TEM ARQUIVO";
        /*$name=$_FILES['photo']['name'];
        $size=$_FILES['photo']['size'];
        $type=$_FILES['photo']['type'];
        $temp=$_FILES['photo']['tmp_name'];
        $caption1=$_POST['caption'];
        $link=$_POST['link'];
        move_uploaded_file($temp,"files/".$name);*/
    // }else{
    //    echo"NÃO TEM ARQUIVO"; 
    // }

    if((isset($_POST['email'])) ){
        $email_ = mysqli_real_escape_string($conn, $_POST['email']);
        $result_email = "SELECT * FROM candidatos WHERE email = '$email_' ";
		$resultado_email = mysqli_query($conn, $result_email);
        $resultado = mysqli_fetch_assoc($resultado_email);
        
        if(isset($resultado)){
            echo '
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <link rel="stylesheet" href="../css/bootstrap.css">    
                <link rel="stylesheet" href="../css/estilo.css">   
                <div class="container">
                    <div class="container-fluid">                               
                        <div class="alert alert-warning text-center h4" role="alert">
                            <mark>Cadastro</mark> já realizado!
                        </div>
                    </div>
                </div>        
                ';
        }else{

            $sql = "INSERT INTO candidatos (nome,cpf,data_nascimento,possui_filhos,qtd_filhos,estado_civil,
            nacionalidade,possui_deficiencia,qual_deficiencia,endereco,complemento,estado_1,cidade_1,
            cep,pais_1,email,telefone,celular,temWhatsapp,rede_social_1,rede_social_2,rede_social_3,
            pretencao_salario,objetivo,pais,estado_2,cidade_2,raio,viajar,transferencia,nivel_1,area_1,
            resumo_profissional,empresa1,segmento1,porte1,data_inicio1,data_termino1,ultimo_cargo1,
            descricao1,empresa2,segmento2,porte2,data_inicio2,data_termino2,ultimo_cargo2,descricao2,
            empresa3,segmento3,porte3,data_inicio3,data_termino3,ultimo_cargo3,descricao3,
            formacaoAcademica,instituicao,curso,data_inicio_academico,data_termino_academico,
            outras_formacao1,instituicao_outras1, data_inicio_curso1,data_termino_curso1,
            outras_formacao2,instituicao_outras2,data_inicio_curso2,data_termino_curso2,
            outras_formacao3,instituicao_outras3, data_inicio_curso3,data_termino_curso3,nome_file)
            VALUES('$nome','$cpf','$data_nascimento','$possui_filhos','$qtd_filhos','$estado_civil','$nacionalidade',
            '$possui_deficiencia','$qual_deficiencia','$endereco','$complemento','$estado_1','$cidade_1',
            '$cep','$pais_1','$email','$telefone','$celular','$temWhatsapp','$rede_social_1','$rede_social_2',
            '$rede_social_3','$pretencao_salario','$objetivo','$pais','$estado_2','$cidade_2','$raio','$viajar',
            '$transferencia','$nivel_1','$area_1','$resumo_profissional','$empresa1','$segmento1','$porte1',
            '$data_inicio1','$data_termino1','$ultimo_cargo1', '$descricao1','$empresa2','$segmento2','$porte2',
            '$data_inicio2','$data_termino2','$ultimo_cargo2','$descricao2','$empresa3','$segmento3',
            '$porte3','$data_inicio3','$data_termino3','$ultimo_cargo3','$descricao3','$formacaoAcademica',
            '$instituicao','$curso','$data_inicio_academico','$data_termino_academico','$outras_formacao1',
            '$instituicao_outras1', '$data_inicio_curso1','$data_termino_curso1','$outras_formacao2',
            '$instituicao_outras2','$data_inicio_curso2','$data_termino_curso2','$outras_formacao3',
            '$instituicao_outras3', '$data_inicio_curso3','$data_termino_curso3','$nome_file');";


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
                    </div> ';
            } 
        }
 
    }
    close_database($conn);
     echo "<script>
        function Redireciona(){
            self.location = 'index.php'
        }
        self.setTimeout('Redireciona()', 2000)
     </script>";

}else{
  echo '<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">    
        <link rel="stylesheet" href="../css/estilo.css">   
        <div class="container">
            <div class="container-fluid">                               
                <div class="alert alert-danger text-center h4" role="alert">
                Atenção, você não tem permissão para acessar esta seção do sistema!
                </div>
            </div>
        </div> ';    
}

?>