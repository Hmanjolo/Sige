 <?php
require_once("principal.php");

?>
<?php

	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
				}
?>
			
<?php
	//Executa consulta
	
	$idCandidato = $_GET['idCandidato'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM inscricao WHERE numeroBI = '$idCandidato' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

?>
	
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p> 	
	            <div class="divH"><label>Editar dados do Candidato</label></div>      
	        </p> 
		</div>
		<div class="panel-body">
        <form class="form-horizontal" name="cadastrarEstudante" method="POST" >
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		
			<div class="col-sm-12">
			  <div class="form-group">
			  
				<div class="col-sm-4">
				Nome:
				  <input type="text" class="input-sm form-control" name="nomeCandidato" value="<?php echo $resultado['nome']?>" placeholder="Nome" required="" >
				</div>
				<div class="col-sm-4">
				Apelido:
				  <input type="text" class="input-sm form-control" name="apelidoCandidato" value="<?php echo $resultado['apelido']?>" placeholder="Apelido" required="" >
				</div>
				<div class="col-sm-4">
				Sexo:
				  <select class="input sm form-control" name="sexoCandidato" required="">
				  	<option value="<?php echo $resultado['sexo']?>"> <?php echo $resultado['sexo']?></option>
				  	<option value="Feminino" >Feminino</option>
				  	<option value="Masculino" >Masculino</option>
					  
					  
					</select>
				</div>
			  </div>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				E-mail:
				  <input type="email" class="input-sm form-control" name="emailCandidato" value="<?php echo $resultado['email']?>" placeholder="E-mail" required="">
				</div>
			  <div class="col-sm-4">
				Contato:
				  <input type="text" class="input-sm form-control" name="contactoCandidato" value="<?php echo $resultado['contacto']?>" placeholder="Contato" required="">
				</div>
				<div class="col-sm-4">
				Data de Nascimento:
				  <input type="text" class="input-sm form-control" name="dataCandidato" value="<?php echo $resultado['dataNascimento']?>" placeholder="Data de Nascimento" required="">
				</div>
				
			  </div>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				Número de BI:
				  <input type="text" class="input-sm form-control" name="biCandidato" value="<?php echo $resultado['numeroBI']?>" placeholder="Número de BI" required="">
				  <input type="hidden" class="input-sm form-control" name="id" value="<?php echo $resultado['numeroBI']?>" placeholder="Número de BI" required="">
				</div>
			  
				<div class="col-sm-4">
				Estado civil:
				  <select class="input sm form-control" name="estadocivilCandidato" required="">
				  	<option value="<?php echo $resultado['estadoCivil']?>"><?php echo $resultado['estadoCivil']?></option>
					  <option value="Casado/a"> Casado(a)</option>
					  <option value="Solteiro/a">Solteiro(a)</option>
					  <option value="Solteiro/a">Viúvo(a)</option>
					  <option value="Solteiro/a">Divorciado</option>
					  <option value="Solteiro/a">União estável</option>
					  
					</select>
				</div>
				<div class="col-sm-4">
				País:
				  <select class="input sm form-control" name="pais" required="">
				  	<option value="<?php echo $resultado['pais']?>"><?php echo $resultado['pais']?></option>
					  <option value="Moçambique">Brasil</option>
					  
					  
					  
					</select>
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  
				
			  <div class="col-sm-4">
				Naturalidade:
				  <input type="text" class="input-sm form-control" name="naturalidadeCandidato" value="<?php echo $resultado['naturalidade']?>" placeholder="Naturalidade" required="">
				</div>
			  
			  <div class="col-sm-4">
				Local de Residencia:
				  <input type="text" class="input-sm form-control" name="localCandidato" value="<?php echo $resultado['localResidencia']?>" placeholder="Local de Residencia" required="">
				</div>
				<?php
                  $classe=$resultado['classe'];
                  $query=mysql_query("SELECT * FROM tabela_turma WHERE nomeTurma like '$classe%' ORDER BY idTurma");
				  
				  
				 
                  ?>
			  <div class="col-sm-4 ">
			  	Classe:
			  	<select class="input sm form-control" name="classe" required="">
				 <?php   echo "<option value = '".$resultado['classe']."'>".$resultado['classe'].'ª'."</option>"; ?>
				  <option value="8">Maternal</option>
				  <option value="9">Infantil 1</option>
				  <option value="10">Infantil 2</option>
				  <option value="11">1º Ano</option>
				  <option value="12">2º Ano</option>
				  <option value="12">3º Ano</option>
				  <option value="12">4º Ano</option>
				  <option value="12">5º Ano</option>
				  <option value="12">6º Ano</option>
				  <option value="12">Outros</option>
				  
				</select>
			  </div>
			  <!-- <div class="col-sm-4 hidden">
				Turma:
				  <select class="input sm form-control" name="turmaCandidato" required="">
				  <option value="">=Selecione a turma=</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma']."</option>";
                      }
                      
                      ?>
					</select>
					</div> -->
				
			  </div>
			</div>
			<div class="col-sm-12">
							  				
								<div class='divH'>
														<div class='alert alert-info text-center' role='alert'>
														
															<label>Encarregados de Educação</label>
														</div>
							  </div>
							  
			</div>
			
          	<div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				Nome do Pai:
				  <input type="text" maxlength="35" class="input-sm form-control" name="pai" value="<?php echo $resultado['pai']?>" placeholder="Nome do Pai" >
				</div>
			  <div class="col-sm-4">
				Nome da Mãe:
				  <input type="text" maxlength="35" class="input-sm form-control" name="mae" value="<?php echo $resultado['mae']?>" placeholder="Nome da Mae" >
				</div>
				<div class="col-sm-4">
				Celular:
				  <input type="text" maxlength="9" class="input-sm form-control" name="contactoEncarregado" value="<?php echo $resultado['contactoEncarregado']?>" placeholder="Ex: 840000000" >
				</div>
				
			  </div>
			</div>
            <div class="col-sm-12">
							  				
								<div class='divH'>
														<div class='alert alert-info text-center' role='alert'>
														
															<label>Dados da escola de anterior</label>
														</div>
							  </div>
							  
			</div>
			<div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				Nome da Escola:
				  <input type="text" class="input-sm form-control" name="Escola_Saida" value="<?php echo $resultado['Escola_Saida']?>" placeholder="Ex: Escola primária Julius Nherere" >
				</div>
			  <div class="col-sm-2">
				Ano:
				  <input type="text" class="input-sm form-control" maxlength="4" name="Ano_Saida" value="<?php echo $resultado['Ano_Saida']?>" placeholder="AAAA" >
				</div>
				<div class="col-sm-4">
				Classe frequentada:
				  <input type="text" class="input-sm form-control" maxlength="2" name="Classe_frequentada" value="<?php echo $resultado['Classe_frequentada']?>" placeholder="Classe" >
				</div>
				<div class="col-sm-2">
				Turma:
				  <input type="text" class="input-sm form-control" maxlength="3" name="Turma_frequentada" value="<?php echo $resultado['Turma_frequentada']?>" placeholder="Classe" >
				</div>
				
			  </div>
			</div>
			  <div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <button type="submit" name="cadastrarEstudante" class="btn  btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
				</div>
				</form>
	</div>
</div>
</div>
</div>
</div>
    
    <?php 

if(isset ($_POST['cadastrarEstudante'])){
    
    
    $nome = $_POST['nomeCandidato'];
    $apelido = $_POST['apelidoCandidato'];
    $email= $_POST['emailCandidato'];
    $contacto = $_POST['contactoCandidato'];
    $data = $_POST['dataCandidato'];
    $bi = $_POST['biCandidato'];
    $sexo = $_POST['sexoCandidato'];
    $estadocivil = $_POST['estadocivilCandidato'];
    $pais= $_POST['pais'];
    $naturalidade = $_POST['naturalidadeCandidato'];
    $local = $_POST['localCandidato'];
    $classe = $_POST['classe'];
    $idCandidato=$_POST['id'];
    $pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$contactoEncarregado = $_POST['contactoEncarregado'];
	$Escola_Saida=$_POST['Escola_Saida'];
	$Ano_Saida=$_POST['Ano_Saida'];
	$Classe_frequentada=$_POST['Classe_frequentada'];
	$Turma_frequentada=$_POST['Turma_frequentada'];
    
    
   
    
    

				//Inserindo os dados do formulario usereditar na tabela usuarios
				
					
				 $Query=mysql_query("UPDATE inscricao set nome = '$nome', apelido = '$apelido', email = '$email', contato = '$contacto', dataNascimento = '$data', numeroBI = '$bi', sexo = '$sexo', estadoCivil = '$estadocivil', pais = '$pais', naturalidade = '$naturalidade', localResidencia = '$local', classe=$classe, pai='$pai',mae='$mae',contactoEncarregado='$contactoEncarregado',Escola_Saida='$Escola_Saida',Ano_Saida='$Ano_Saida',Classe_frequentada='$Classe_frequentada',Turma_frequentada='$Turma_frequentada' ,dataModificacao = NOW() WHERE numeroBI='$idCandidato'");
               
				$linha=mysql_affected_rows();
				
				
				if ($Query){
				$_SESSION['mensagem'] = "			<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Dados do candidato <strong>$nome</strong> editados com sucesso!
														</div>
												   	</div>";
		
				header("Location: listar_inscricoes.php");
				}
				else{echo mysql_error();
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															 <strong>Erro ao editar os dados</strong> ! ".mysql_error()."
														</div>
												   	</div>";
													
		
				//Manda o usuario para a tela de login
				header("Location: candidato-editar.php?idCandidato=$idCandidato");
				}
			}					                

?>
    
<?php
	include_once("rodape.php");
?>

<script type="text/javascript">
	
</script>