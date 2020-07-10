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
    $cadidato['email'] = $_SESSION['usuarioEmail'];
?>

<?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2") 
        OR ($_SESSION['usuarioNiveisAcessoId'] == "3") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){?>
<div class="container">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm-6">
				<h2> <strong class="fonteMaiuscula">Cadastrar Curriculum</strong> </h2>
			</div>
			<div class="col-sm-6 text-right h2">
				<!-- <a class="btn btn-info btn-sm" href="novo.php"><i class="fa fa-plus"></i> Novo Cliente</a> -->
				<a class="btn btn btn-outline-secondary btn-sm" onClick="history.go(0)"><i class="fa fa-refresh"></i> Atualizar</a>
				<a class="btn btn btn-outline-secondary btn-sm" href="index.php"><i class="fa fa-backward"></i> Voltar</a>
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

        
        <form action="novo_sql.php" method="post" >
            <div class="tab-content" id="myTabContent">

                <p class="espaco_top"></p>
                
                <!-- PRIMEIRA ABA -->
                <div class="tab-pane fade show active" id="dadosPessoal" role="tabpanel" aria-labelledby="dadosPessoal-tab">
                    
                    <div class="form-row">
                        
                        <div class="form-group col-md-6" >
                            <label for="nome"> <strong> Nome </strong> </label>
                            <input type="text" class="form-control fonteMaiuscula"  name="nome" placeholder="Nome completo"  required="required"d>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="Cpf"> <strong> CPF </strong> </label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"  required="required"="required="required"" >
                        </div>

                        <div class="form-group col-md-2">
                            <label for="data_nascimento"> <strong> Data de Nascimento </strong> </label>
                            <input type="date" class="form-control" id="data_nascimento"  name="data_nascimento" placeholder="Data de nascimento" required="required">
                        </div>

                        <div class="form-group col-md-1">
                            <label for="idade"> <strong> Idade </strong> </label>
                            <input type="number" class="form-control" id="idade" name="" min="15" max="100" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="estado_civil"> <strong>Estado Civil</strong> </label>
                            <select class="select form-control input-sm" name="estado_civil" >
                                    <option value="">-</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>	
                                    <option value="Divorciado">Divorciado</option> 
                                    <option value="Amasiado">Amasiado</option>
                                    <option value="União Estável">União Estável</option>                                    
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nacionalidade"> <strong> Nacionalidade </strong> </label>
                            <input type="text" class="form-control fonteMaiuscula" name="nacionalidade" placeholder="Ex: Brasileira">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="possui_filhos"> <strong>Possui filhos? </strong> </label>
                            <select class="select form-control input-sm" name="possui_filhos">
                                <option value="Não">Não</option>
                                <option value="Sim">Sim</option>                                    				           	
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="qtd_filhos"> <strong> Quantos? </strong> </label>
                            <input type="number" class="form-control" name="qtd_filhos" min="1" max="20">
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="possui_deficiencia"> <strong>Possui deficiência? </strong> </label>
                            <select class="select form-control input-sm" name="possui_deficiencia" id="id_possui_deficiencia">
                                <option value="Não">Não</option> 
                                <option value="Sim">Sim</option>    				           	
                            </select>
                        </div>

                        <div class="form-group col-md-10">
                            <label for="qual_deficiencia"> <strong> Qual? </strong> </label>
                            <input type="text" class="form-control" value="" name="qual_deficiencia" placeholder="Se sim, explique o tipo.">
                        </div> 

                        <div class="form-group col-md-7">
                            <label for="endereco"> <strong> Endereço </strong> </label>
                            <input type="text" class="form-control fonteMaiuscula" name="endereco" placeholder="Rua, Avenida, Número, Bairro" required="required">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="complemento"> <strong> Complemento </strong> </label>
                            <input type="text" class="form-control fonteMaiuscula" name="complemento" placeholder="APTO, Bloco">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="cep"> <strong> CEP </strong> </label>
                            <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" required="required">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="pais_1" class="control-label"><strong>Pais</strong></label>
                            <select class="select form-control input-sm" name="pais_1" id="pais_1">
                                <option value="">Pais</option>
                            </select>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="estado_1" class="control-label" ><strong>Estado</strong></label>
                            <select class="select form-control input-sm" name="estado_1" id="uf" disabled data-target="#cidade">
                                <option value="">Estado</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cidade_1" class="control-label"><strong>Cidade</strong></label>
                            <select class="select form-control input-sm" name="cidade_1" id="cidade">
                                <option value="">Cidade</option>
                            </select>
                        </div>       

                        <?php if($_SESSION['usuarioNiveisAcessoId'] == "3"){ ?>
                            <div class="form-group col-md-6">
                                <label for="email"> <strong> Email </strong> </label>
                                <input type="email" class="form-control fonteMinuscula" name="email" value= <?php echo $cadidato['email']; ?> required="required" readonly> 
                            </div> 
                        <?php  }else{  ?>
                            
                            <?php if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "2")
	                        OR ($_SESSION['usuarioNiveisAcessoId'] == "255")){ ?>

                                <div class="form-group col-md-6">
                                    <label for="email"> <strong> Email </strong> </label>
                                    <input type="email" class="form-control fonteMinuscula" name="email" placeholder="Email" required="required">
                                </div>
                                    
                        <?php } 
                            } ?>


                        <div class="form-group col-md-2">
                            <label for="telefone"> <strong> Telefone Fixo </strong> </label>
                            <input type="tel" class="form-control" name="telefone" id="tel" placeholder="Telefone Fixo" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="celular"> <strong> Celular </strong> </label>
                            <input type="tel" class="form-control" name="celular" id="cel" placeholder="Celular" required="required">
                        </div> 

                        <div class="col-md-2">
                            <label for="temWhatsapp"> <strong> Tem WhatsApp? </strong> </label>
                            <select class="select form-control input-sm" name="temWhatsapp" id="">
                                    <option value="Não">Não</option>	
                                    <option value="Sim">Sim</option>			           	
                            </select>
                        </div>  

                        <div class="form-group col-md-8">
                            <label for="rede_social_1"> <strong> Redes Sociais </strong> </label>
                            <input type="text" class="form-control" name="rede_social_1" placeholder="Linkedin, Site, Blog, etc..."  >
                        </div>

                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="rede_social_2" placeholder="Linkedin, Site, Blog, etc..."  >
                        </div>

                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="rede_social_3" placeholder="Linkedin, Site, Blog, etc..."  >
                        </div>

                    </div> 
                    
                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary" href="index.php"> Voltar</a>
                        <a class="btn btn btn-outline-secondary btnNext">Proximo</a>
                        <button type="reset" class="btn btn btn-outline-danger">Limpar</button>
                    </div>
               
                </div>
                <!-- PRIMEIRA ABA -->

                <!-- SEGUNDA ABA -->
                <div class="tab-pane fade" id="dataProfissao" role="tabpanel" aria-labelledby="dataProfissao-tab">
                    <div class="form-row">
                       
                        <div class="form-group col-md-3">
                            <label for="pretencao_salario"> <strong> Pretensão salarial  </strong> </label>
                            <input type="text" class="form-control" name="pretencao_salario" placeholder="R$"  onkeyup="k(this);" required="required"/>
                        </div>                        
                        <div class="form-group col-md-12">
                            <label for="objetivo"> <strong> Objetivo profissional  </strong> </label>
                            <textarea name="objetivo" class="char-count form-control" 
                            placeholder="Maximo 500 caracteres, seja sucinto." rows="5" maxlength="500" id="text_area1" required="required"></textarea>
                            <p class="text-muted"><small><span name="objetivo">500</span></small> caracteres restantes</p>
                        </div>          


                        <div class="form-group col-md-12" >
                            <label for="historico_profissional"> <strong>Região de Interesse de Trabalho</strong> </label>
                            <hr class="hr_2"> 
                        </div>            

                        <div class="form-group col-md-3">
					        <label for="pais" class="control-label fonteMaiuscula"id="campo_pais"><strong>Pais</strong></label>
                            <input type="text" class="form-control input-sm" name="pais" required="required">						
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado_2" class="control-label fonteMaiuscula" id="campo_estado"><strong>Estado</strong></label>
                            <input type="text" class="form-control input-sm" name="estado_2" required="required">				    
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="cidade_2" class="control-label fonteMaiuscula" id="campo_cidade"><strong>Cidade</strong></label> 
                            <input type="text" class="form-control input-sm" name="cidade_2" required="required">                      
                        </div>
                        <div class="form-group col-md-2">
                            <label for="raio" class="control-label" id="campo_cidade"><strong>Em um raio de...km</strong></label> 
                            <input type="number" class="form-control input-sm" placeholder="Km" name="raio">                      
                        </div>
                        <div class="form-group col-md-3">
                            <label for="viajar"> <strong>Disponibilidade para viajar? </strong> </label>
                            <select class="select form-control input-sm" name="viajar">
                                    <option value=""> - </option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>				           	
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transferencia"> <strong>Disponibilidade para transferência? </strong> </label>
                            <select class="select form-control input-sm " name="transferencia">
                                    <option value=""> - </option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>				           	
                            </select>
                        </div>
                        <div class="form-row col-md-12"> 
                            <div class="form-group col-md-3">
                                <label for="nivel_1"> <strong>Nivel</strong> </label>
                                <select id="nivel_1" class="select form-control input-sm" name="nivel_1">
                                        <option value="">Não Informado</option>                                    
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="area_1"> <strong>Área </strong> </label>
                                <select id="area_1" class="select form-control input-sm" name="area_1">
                                    <option value="">Não Informado</option>                                    			           	
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="resumo_profissional"> <strong> Resumo Profissional   </strong> </label>
                            <textarea name="resumo_profissional"  class="char-count form-control" 
                            placeholder="Maximo 2000 caracteres, seja sucinto." rows="5" maxlength="2000" required="required"></textarea>
                            <p class="text-muted"><small><span name="resumo_profissional">2000</span></small> caracteres restantes</p>
                        </div>

                        <!-- empresa 1 -->
                        <div class="form-group col-md-12" >
                            <label for="historico_profissional"> <strong> Histórico Profissional</strong> </label>
                            <hr class="hr_2"> 
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="empresa1"> <strong>1 - Empresa</strong> </label>
                            <input type="text" class="form-control" name="empresa1" placeholder="Nome da empresa">
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento1"> <strong> Segmento</strong> </label>
                            <input type="text" class="form-control" name="segmento1" placeholder="Ramo de atividade" >
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte1"> <strong>Porte</strong> </label>
                            <input type="text" class="form-control" name="porte1" placeholder="" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_inicio1"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio1" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_termino1"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino1" placeholder="">
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo1"> <strong>Último cargo</strong> </label>
                            <input type="text" class="form-control" name="ultimo_cargo1" placeholder=""  >
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao1"> <strong> Descrição   </strong> </label>
                            <textarea name="descricao1"  class="char-count form-control" 
                            placeholder="Maximo 2000 caracteres, seja sucinto." rows="5" maxlength="2000"></textarea>
                            <p class="text-muted"><small><span name="descricao1">2000</span></small> caracteres restantes</p>
                        </div>
                        <!-- empresa 1 -->

                        <!-- empresa 2 -->
                        <div class="form-group col-md-12" >
                            <hr class="hr_2"> 
                        </div>
                        <div class="form-group col-md-5" >
                            <label for="empresa2"> <strong>2 - Empresa</strong> </label>
                            <input type="text" class="form-control" name="empresa2" placeholder="Nome da empresa" >
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento2"> <strong> Segmento</strong> </label>
                            <input type="text" class="form-control" name="segmento2" placeholder="Ramo de atividade"  >
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte2"> <strong>Porte</strong> </label>
                            <input type="text" class="form-control" name="porte2" placeholder=""  >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_inicio2"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio2" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_termino2"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino2" placeholder="">
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo2"> <strong>Último cargo</strong> </label>
                            <input type="text" class="form-control" name="ultimo_cargo2" placeholder=""  >
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao2"> <strong> Descrição   </strong> </label>
                            <textarea name="descricao2"  class="char-count form-control" 
                            placeholder="Maximo 2000 caracteres, seja sucinto." rows="5" maxlength="2000"></textarea>
                            <p class="text-muted"><small><span name="descricao2">2000</span></small> caracteres restantes</p>
                        </div>
                        <!-- empresa 2 -->

                        <!-- empresa 3 -->
                        <div class="form-group col-md-12" >
                            <hr class="hr_2"> 
                        </div>
                        <div class="form-group col-md-5" >
                            <label for="empresa3"> <strong>3 - Empresa</strong> </label>
                            <input type="text" class="form-control" name="empresa3" placeholder="Nome da empresa" >
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="segmento3"> <strong> Segmento</strong> </label>
                            <input type="text" class="form-control" name="segmento3" placeholder="Ramo de atividade"  >
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="porte3"> <strong>Porte</strong> </label>
                            <input type="text" class="form-control" name="porte3" placeholder=""  >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_inicio3"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio3" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_termino3"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino3" placeholder="">
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="ultimo_cargo3"> <strong>Último cargo</strong> </label>
                            <input type="text" class="form-control" name="ultimo_cargo3" placeholder=""  >
                        </div>
                        <div class="form-group col-md-12"  style="margin-top: 0.1em;">
                            <p>Se for seu emprego atual, deixe a data de término em banco.</p>
                        </div>            
                        <div class="form-group col-md-10">
                            <label for="descricao3"> <strong> Descrição   </strong> </label>
                            <textarea name="descricao3"  class="char-count form-control" 
                            placeholder="Maximo 2000 caracteres, seja sucinto." rows="5" maxlength="2000"></textarea>
                            <p class="text-muted"><small><span name="descricao3">2000</span></small> caracteres restantes</p>
                        </div>
                        <!-- empresa 3 -->


                    </div> 

                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary btnPrevious">Voltar</a>                        
                        <a class="btn btn btn-outline-secondary btnNext">Proximo</a>
                        <button type="reset" class="btn btn btn-outline-danger">Limpar</button>
                    </div>

                </div>
                <!-- SEGUNDA ABA -->

                <!-- TERCEIRA ABA -->
                <div class="tab-pane fade" id="formacaoAcademica" role="tabpanel" aria-labelledby="formacaoAcademica-tab">

                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label for="formacaoAcademica"> <strong>Formação </strong> </label>
                            <select class="select form-control input-sm " name="formacaoAcademica" required="required">
                                <option value=""> - </option>
                                <option value="fundamental">Fundamental</option>
                                <option value="medio">Médio</option>	
                                <option value="superior incopleto">Superior incopleto</option>				           	
                                <option value="superior cursando">Superior cursando</option>
                                <option value="superior completo">Superior completo</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="instituicao"> <strong> Instituição</strong> </label>
                            <input type="text" class="form-control" name="instituicao" placeholder="Instituição de ensino" >
                        </div>

                        <div class="form-group col-md-5" >
                            <label for="curso"> <strong> Curso</strong> </label>
                            <input type="text" class="form-control" name="curso" placeholder="Nome do curso"  required="required">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="data_inicio_academico"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio_academico" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_termino_academico"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino_academico" placeholder="">
                        </div>

                        <div class="form-group col-md-12" >
                            <p class="espaco_top"></p>
                            <label for="outras_formacao"> <strong> Outros</strong> </label>
                            <hr class="hr_2"> 
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao1"> <strong>1 - Curso</strong> </label>
                            <input type="text" class="form-control" name="outras_formacao1" placeholder=""  >
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras1"> <strong> Instituição</strong> </label>
                            <input type="text" class="form-control" name="instituicao_outras1" placeholder="Instituição de ensino"  >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso1"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio_curso1" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso1"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino_curso1" placeholder="">
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao2"> <strong>2 - Curso</strong> </label>
                            <input type="text" class="form-control" name="outras_formacao2" placeholder=""  >
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras2"> <strong> Instituição</strong> </label>
                            <input type="text" class="form-control" name="instituicao_outras2" placeholder="Instituição de ensino"  >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso2"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio_curso2" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso2"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino_curso2" placeholder="">
                        </div>

                        <div class="form-group col-md-4" >
                            <label for="outras_formacao3"> <strong>3 - Curso</strong> </label>
                            <input type="text" class="form-control" name="outras_formacao3" placeholder=""  >
                        </div>
                        <div class="form-group col-md-4" >
                            <label for="instituicao_outras3"> <strong> Instituição</strong> </label>
                            <input type="text" class="form-control" name="instituicao_outras3" placeholder="Instituição de ensino"  >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_inicio_curso3"> <strong> Data início </strong> </label>
                            <input type="date" class="form-control"  name="data_inicio_curso3" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_termino_curso3"> <strong> Data término </strong> </label>
                            <input type="date" class="form-control"  name="data_termino_curso3" placeholder="">
                        </div>

                    </div>

                    <!-- <p class="espacobottom"></p> -->
                    <div class="form-group">
                        <a class="btn btn btn-outline-secondary btnPrevious">Voltar</a>
                        <button type="submit" class="btn btn btn-outline-success">Salvar</button>
                        <button type="reset" class="btn btn btn-outline-danger">Limpar</button>
                    </div>


                </div>
                <!-- TERCEIRA ABA -->

                <!-- <p class="espacobottom"></p> -->

                

            </div>

            <div class="row form-group col-md-5">
                <input  type="file" name="file_curriculo" id="input15">                    
            </div>

            <p class="espacobottom"></p>
            

        </form>








    </div>
</div>
 
<?php }else{?>
        <div class="alert alert-danger h5 text-center" role="alert">
            Atenção, você não tem permissão para acessar esta seção do sistema!
        </div>
		
<?php   }?>

<?php include(FOOTER_TEMPLATE); ?>