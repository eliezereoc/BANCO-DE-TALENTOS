<?php 
if (!isset($_SESSION)) session_start();// inicia em cada página diferente
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioId'])) {  
  session_destroy();// Destrói a sessão por segurança  
  header("Location: ../login/"); // Redireciona o visitante de volta pro login
  exit;
}
    // require_once '../login/valida_sessao.php';
    require_once 'func.php';  
    include(HEADER_TEMPLATE);

?>

<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") OR ($_SESSION['usuarioNiveisAcessoId'] == "3")
	OR ($_SESSION['usuarioNiveisAcessoId'] == "4") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){  
        
    if($_SESSION['usuarioNiveisAcessoId'] == "3"){
        $email = $_SESSION['usuarioEmail'];
        $candidato = buscaPorEmail( $email);
    }else{
        $id = $_GET['id'];
        $candidato = busca('candidatos', $id);
    }
    
    
?>
<div class="container">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm-6">
				<h2> <strong class="fonteMaiuscula">Visualizar Curriculum</strong> </h2>
			</div>
			<div class="col-sm-6 text-right h2">
				<a class="btn btn-info btn-sm" href="novo.php"><i class="fa fa-plus"></i> Novo</a>
				<a class="btn btn btn-outline-secondary btn-sm" onClick="history.go(0)"><i class="fa fa-refresh"></i> Atualizar</a>
                <?php if($_SESSION['usuarioNiveisAcessoId'] == "3"){ ?>
				    <a class="btn btn btn-outline-secondary btn-sm" href="index.php"><i class="fa fa-backward"></i> Voltar</a>
                <?php }else{ ?>
                    <a class="btn btn btn-outline-secondary btn-sm" href="listar.php"><i class="fa fa-backward"></i> Voltar</a>
                <?php } ?>
			</div>
		</div>	
        <?php
            if(!empty($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
        <hr id="hr_1">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li>
                <a class="nav-link active" id="dadosPessoal-tab" data-toggle="tab" href="#dadosPessoal" role="tab" 
                aria-controls="dadosPessoal" aria-selected="true">DADOS PESSOAIS</a>
            </li>
            <li>
                <a class="nav-link" id="dataProfissao-tab" data-toggle="tab" href="#dataProfissao" role="tab" 
                aria-controls="dataProfissao" aria-selected="false">DADOS PROFISSIONAIS</a>
            </li>
            <li>
                <a class="nav-link" id="formacaoAcademica-tab" data-toggle="tab" href="#formacaoAcademica" role="tab" 
                -controls="formacaoAcademica" aria-selected="false">FORMAÇÃO ACADÊMICA</a>
            </li>
        </ul>

        
            <div class="tab-content" id="myTabContent">

                <p class="espaco_top"></p>
                
                <!-- PRIMEIRA ABA -->
                <div class="tab-pane fade show active" id="dadosPessoal" role="tabpanel" aria-labelledby="dadosPessoal-tab">
                    
                    <div class="form-row">
                        
                        <div class="form-group col-md-6" >
                            <label for="nome"> <strong> Nome </strong> </label>
                            <label type="text" class="form-control fonteMaiuscula"> <?php echo$candidato['nome']; ?> </label>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="Cpf"> <strong> CPF </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['cpf']; ?> </label>
                        </div>
                        <?php  $data_nascimento = new DateTime($candidato['data_nascimento']);  ?>
                        <div class="form-group col-md-2">
                            <label for="data_nascimento"> <strong> Data de Nascimento </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_nascimento->format('d-m-Y'); ?> </label>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="idade"> <strong> Idade </strong> </label>
                            <!-- <label type="text" class="form-control "> <?php //echo$candidato['idade']; ?> </label> -->
                            <label type="number" class="form-control" id="idade" name="" min="15" max="100" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="estado_civil"> <strong>Estado Civil</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['estado_civil']; ?> </label>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nacionalidade"> <strong> Nacionalidade </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['nacionalidade']; ?> </label>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="possui_filhos"> <strong>Possui filhos? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['possui_filhos']; ?> </label>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="qtd_filhos"> <strong> Quantos? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['qtd_filhos']; ?> </label>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="possui_deficiencia"> <strong>Possui deficiência? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['possui_deficiencia']; ?> </label>
                        </div>

                        <div class="form-group col-md-10">
                            <label for="qual_deficiencia"> <strong> Qual? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['qual_deficiencia']; ?> </label>
                        </div> 

                        <div class="form-group col-md-7">
                            <label for="endereco"> <strong> Endereço </strong> </label>
                            <label type="text" class="form-control fonteMaiuscula"> <?php echo$candidato['endereco']; ?> </label>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="complemento"> <strong> Complemento </strong> </label>
                            <label type="text" class="form-control fonteMaiuscula"> <?php echo$candidato['complemento']; ?> </label>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="cep"> <strong> CEP </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['cep']; ?> </label>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="pais_1" class="control-label"><strong>Pais</strong></label>
                            <label type="text" class="form-control "> <?php echo$candidato['pais_1']; ?> </label>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="estado_1" class="control-label" ><strong>Estado</strong></label>
                            <label type="text" class="form-control "> <?php echo$candidato['estado_1']; ?> </label>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cidade_1" class="control-label"><strong>Cidade</strong></label>
                            <label type="text" class="form-control "> <?php echo$candidato['cidade_1']; ?> </label>
                        </div>                        

                        <div class="form-group col-md-6">
                            <label for="email"> <strong> Email </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['email']; ?> </label>
                        </div> 
                                    
                        <div class="form-group col-md-2">
                            <label for="telefone"> <strong> Telefone Fixo </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['telefone']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="celular"> <strong> Celular </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['celular']; ?> </label>
                        </div> 

                        <div class="col-md-2">
                            <label for="temWhatsapp"> <strong> Tem WhatsApp? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['temWhatsapp']; ?> </label>
                        </div>  

                        <div class="form-group col-md-8">
                            <label for="rede_social_1"> <strong> Redes Sociais </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['rede_social_1']; ?> </label>
                        </div>

                        <div class="form-group col-md-8">
                            <label type="text" class="form-control "> <?php echo$candidato['rede_social_2']; ?> </label>
                        </div>

                        <div class="form-group col-md-8">
                        <label type="text" class="form-control "> <?php echo$candidato['rede_social_3']; ?> </label>
                        </div>

                    </div> 
                    
                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary" href="index.php"> Voltar</a>
                        <a class="btn btn btn-outline-secondary btnNext">Proximo</a>
                    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") OR ($_SESSION['usuarioNiveisAcessoId'] == "3")
	                    OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
                        <a class="btn btn btn-outline-success" href="editar_curriculo.php" role="button">Editar</a>
                    <?php } ?>
                    </div>
               
                </div>
                <!-- PRIMEIRA ABA -->

                <!-- SEGUNDA ABA -->
                <div class="tab-pane fade" id="dataProfissao" role="tabpanel" aria-labelledby="dataProfissao-tab">
                    <div class="form-row">
                       
                        <div class="form-group col-md-3">
                            <label for="pretencao_salario"> <strong> Pretensão salarial  </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['pretencao_salario']; ?> </label>
                        </div>                        
                        <div class="form-group col-md-12">
                            <label for="objetivo"> <strong> Objetivo profissional  </strong> </label>
                            <textarea class="char-count form-control" rows="5" maxlength="500" disabled><?php echo$candidato['objetivo']; ?></textarea>
                        </div>          


                        <div class="form-group col-md-12" >
                            <label for="historico_profissional"> <strong>Região de Interesse de Trabalho</strong> </label>
                            <hr class="hr_2"> 
                        </div>            

                        <div class="form-group col-md-3">
					        <label for="pais" class="control-label fonteMaiuscula"><strong>Pais</strong></label>
                            <label type="text" class="form-control "> <?php echo$candidato['pais']; ?> </label>						
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado_2" class="control-label fonteMaiuscula" ><strong>Estado</strong></label>
                            <label type="text" class="form-control "> <?php echo$candidato['estado_2']; ?> </label>			    
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="cidade_2" class="control-label fonteMaiuscula" ><strong>Cidade</strong></label> 
                            <label type="text" class="form-control "> <?php echo$candidato['cidade_2']; ?> </label>                 
                        </div>
                        <div class="form-group col-md-2">
                            <label for="raio" class="control-label" ><strong>Em um raio de...km</strong></label> 
                            <label type="text" class="form-control "> <?php echo$candidato['raio']; ?> </label>                    
                        </div>
                        <div class="form-group col-md-3">
                            <label for="viajar"> <strong>Disponibilidade para viajar? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['viajar']; ?> </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transferencia"> <strong>Disponibilidade para transferência? </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['transferencia']; ?> </label>
                        </div>
                        <div class="form-row col-md-12"> 
                            <div class="form-group col-md-3">
                                <label for="nivel_1"> <strong>Nivel</strong> </label>
                                <label type="text" class="form-control "> <?php echo$candidato['nivel_1']; ?> </label>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="area_1"> <strong>Área </strong> </label>
                                <label type="text" class="form-control "> <?php echo$candidato['area_1']; ?> </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="resumo_profissional"> <strong> Resumo Profissional   </strong> </label>
                            <textarea class="char-count form-control" rows="5" maxlength="2000" disabled><?php echo$candidato['resumo_profissional']; ?></textarea>
                        </div>

                        <!-- empresa 1 -->
                        <div class="form-group col-md-12" >
                            <label for="historico_profissional"> <strong> Histórico Profissional</strong> </label>
                            <hr class="hr_2"> 
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="empresa1"> <strong>1 - Empresa</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['empresa1']; ?> </label>
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento1"> <strong> Segmento</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['segmento1']; ?> </label>
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte1"> <strong>Porte</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['porte1']; ?> </label>
                        </div>

                        <?php  $data_inicio1 = new DateTime($candidato['data_inicio1']);  ?>
                        <div class="form-group col-md-3">
                            <label for="data_inicio1"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio1->format('d-m-Y'); ?> </label>
                        </div>

                        <?php  $data_termino1 = new DateTime($candidato['data_termino1']);  ?>
                        <div class="form-group col-md-3">
                            <label for="data_termino1"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino1->format('d-m-Y'); ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo1"> <strong>Último cargo</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['ultimo_cargo1']; ?> </label>
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao1"> <strong> Descrição   </strong> </label>
                            <textarea class="char-count form-control" rows="5" maxlength="2000" disabled><?php echo$candidato['descricao1']; ?></textarea>
                        </div>
                        <!-- empresa 1 -->

                        <!-- empresa 2 -->
                        <div class="form-group col-md-12" >
                            <hr class="hr_2"> 
                        </div>
                        <div class="form-group col-md-5" >
                            <label for="empresa2"> <strong>2 - Empresa</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['empresa2']; ?> </label>
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento2"> <strong> Segmento</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['segmento2']; ?> </label>
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte2"> <strong>Porte</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['porte2']; ?> </label>
                        </div>

                        <?php  $data_inicio2 = new DateTime($candidato['data_inicio2']);  ?>                        
                        <div class="form-group col-md-3">
                            <label for="data_inicio2"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio2->format('d-m-Y'); ?> </label>
                        </div>

                        <?php  $data_termino2 = new DateTime($candidato['data_termino2']);  ?>                        
                        <div class="form-group col-md-3">
                            <label for="data_termino2"> <strong> Data término </strong> </label>
                            <<label type="date" class="form-control "> <?php echo  $data_termino2->format('d-m-Y'); ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo2"> <strong>Último cargo</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['ultimo_cargo2']; ?> </label>
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao2"> <strong> Descrição   </strong> </label>
                            <textarea  class="char-count form-control" rows="5" maxlength="2000" disabled><?php echo$candidato['descricao2']; ?> </textarea>
                        </div>
                        <!-- empresa 2 -->

                        <!-- empresa 3 -->
                        <div class="form-group col-md-12" >
                            <hr class="hr_2"> 
                        </div>
                        <div class="form-group col-md-5" >
                            <label for="empresa3"> <strong>3 - Empresa</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['empresa3']; ?> </label>
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento3"> <strong> Segmento</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['segmento3']; ?> </label>
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte3"> <strong>Porte</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['porte3']; ?> </label>
                        </div>

                        <?php  $data_inicio3 = new DateTime($candidato['data_inicio3']);  ?>                        
                        <div class="form-group col-md-3">
                            <label for="data_inicio3"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio3->format('d-m-Y'); ?></label>
                        </div>

                        <?php  $data_termino3 = new DateTime($candidato['data_termino3']);  ?>                        
                        <div class="form-group col-md-3">
                            <label for="data_termino3"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino3->format('d-m-Y'); ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo3"> <strong>Último cargo</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['ultimo_cargo3']; ?> </label>
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao3"> <strong> Descrição   </strong> </label>
                            <textarea class="char-count form-control" rows="5" maxlength="2000" disabled><?php echo$candidato['descricao3']; ?></textarea>
                        </div>
                        <!-- empresa 3 -->


                    </div> 

                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary btnPrevious">Voltar</a>                        
                        <a class="btn btn btn-outline-secondary btnNext">Proximo</a>
                    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") OR ($_SESSION['usuarioNiveisAcessoId'] == "3")
	                    OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
                        <a class="btn btn btn-outline-success" href="editar_curriculo.php" role="button">Editar</a>
                    <?php } ?>
                    </div>

                </div>
                <!-- SEGUNDA ABA -->

                <!-- TERCEIRA ABA -->
                <div class="tab-pane fade" id="formacaoAcademica" role="tabpanel" aria-labelledby="formacaoAcademica-tab">

                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label for="formacaoAcademica"> <strong>Formação </strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['formacaoAcademica']; ?> </label>
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="instituicao"> <strong> Instituição</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['instituicao']; ?> </label>
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="curso"> <strong> Curso</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['curso']; ?> </label>
                        </div>

                        <?php  $data_inicio_academico = new DateTime($candidato['data_inicio_academico']);  ?>                        
                        <div class="form-group col-md-2">
                            <label for="data_inicio_academico"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio_academico->format('d-m-Y'); ?> </label>
                        </div>

                        <?php  $data_termino_academico = new DateTime($candidato['data_termino_academico']);  ?>       
                        <div class="form-group col-md-2">
                            <label for="data_termino_academico"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino_academico->format('d-m-Y'); ?> </label>
                        </div>

                        <div class="form-group col-md-12" >
                            <p class="espaco_top"></p>
                            <label for="outras_formacao"> <strong> Outros</strong> </label>
                            <hr class="hr_2"> 
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao1"> <strong>1 - Curso</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['outras_formacao1']; ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras1"> <strong> Instituição</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['instituicao_outras1']; ?> </label>
                        </div>

                        <?php  $data_inicio_curso1 = new DateTime($candidato['data_inicio_curso1']);  ?>                           
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso1"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio_curso1->format('d-m-Y'); ?> </label>
                        </div>

                        <?php  $data_termino_curso1 = new DateTime($candidato['data_termino_curso1']);  ?>                         
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso1"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino_curso1->format('d-m-Y'); ?> </label>
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao2"> <strong>2 - Curso</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['outras_formacao2']; ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras2"> <strong> Instituição</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['instituicao_outras2']; ?> </label>
                        </div>

                        <?php  $data_inicio_curso2 = new DateTime($candidato['data_inicio_curso2']);  ?>                         
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso2"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio_curso2->format('d-m-Y'); ?></label>
                        </div>

                        <?php  $data_termino_curso2 = new DateTime($candidato['data_termino_curso2']);  ?>                        
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso2"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino_curso2->format('d-m-Y'); ?> </label>
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao3"> <strong>3 - Curso</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['outras_formacao3']; ?> </label>
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras3"> <strong> Instituição</strong> </label>
                            <label type="text" class="form-control "> <?php echo$candidato['instituicao_outras3']; ?> </label>
                        </div>

                        <?php  $data_inicio_curso3 = new DateTime($candidato['data_inicio_curso3']);  ?>                         
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso3"> <strong> Data início </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_inicio_curso3->format('d-m-Y'); ?></label>
                        </div>

                        <?php  $data_termino_curso3 = new DateTime($candidato['data_termino_curso3']);  ?>                         
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso3"> <strong> Data término </strong> </label>
                            <label type="date" class="form-control "> <?php echo  $data_termino_curso3->format('d-m-Y'); ?> </label>
                        </div>

                    </div>

                    <p class="espacobottom"></p>
                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary btnPrevious">Voltar</a>
                    <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") OR ($_SESSION['usuarioNiveisAcessoId'] == "3")
	                    OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>
                        <a class="btn btn btn-outline-success" href="editar_curriculo.php" role="button">Editar</a>
                    <?php } ?>
                    </div>


                </div>
                <!-- TERCEIRA ABA -->

                <!-- <p class="espacobottom"></p> -->
            </div>

            <p class="espacobottom"></p>
    </div>
</div>
 
<?php 
    }else{ ?>
        
        <div class="alert alert-danger h5 text-center" role="alert">
            Atenção, você não tem permissão para acessar esta seção do sistema!
        </div>
		
        <?php   
    }
?>


<?php include(FOOTER_TEMPLATE); ?>