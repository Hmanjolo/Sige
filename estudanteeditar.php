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
	
	$idEstudante = $_GET['idEstudante'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tabela_estudante WHERE idEstudante = '$idEstudante' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

?>
	
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p> 	
	            <div class="divH"><label>Editar dados do Aluno</label></div>      
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
				Número de Candidato:
				  <input type="text" class="input sm form-control" name="numeroCandidato" value="<?php echo $resultado['numeroCandidato']?>" placeholder="Número de Candidato" required="" disabled autofocus="">
				</div>
				<div class="col-sm-4">
				Nome:
				  <input type="text" class="input-sm form-control" name="nomeCandidato" value="<?php echo $resultado['nome']?>" placeholder="Nome" required="" >
				</div>
				<div class="col-sm-4">
				Apelido:
				  <input type="text" class="input-sm form-control" name="apelidoCandidato" value="<?php echo $resultado['apelido']?>" placeholder="Apelido" required="" >
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
				  <input type="hidden" class="input-sm form-control" name="idUsuario" value="<?php echo $resultado['idUsuario']?>" placeholder="ID do Usuario" required="">
				</div>
			  <div class="col-sm-4">
				Sexo:
				  <select class="input sm form-control" name="sexoCandidato" required="">
				  	<option value="<?php echo $resultado['sexo']?>"> <?php echo $resultado['sexo']?></option>
				  	<option value="Femenino" >Feminino</option>
				  	<option value="Masculino" >Masculino</option>
					  
					  
					</select>
				</div>
				<div class="col-sm-4">
				Estado civil:
				  <select class="input sm form-control" name="estadocivilCandidato" required="">
				  	<option value="<?php echo $resultado['estadoCivil']?>"><?php echo $resultado['estadoCivil']?></option>
					  <option value="Casado/a">Solteiro(a)</option>
					  <option value="Solteiro/a">Casado(a)</option>
					  <option value="Solteiro/a">Viúvo(a)</option>
					  <option value="Solteiro/a">Divorciado(a)</option>
					  <option value="Solteiro/a">União estável</option>
					  
					</select>
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				País:
				  <select class="input sm form-control" name="pais" required="">
				  	<option value="<?php echo $resultado['pais']?>"><?php echo $resultado['pais']?></option>
					  <option value="Moçambique">Brasil</option>
					  
					</select>
				</div>
				
			  <div class="col-sm-4">
				Naturalidade:
				  <input type="text" class="input-sm form-control" name="naturalidadeCandidato" value="<?php echo $resultado['naturalidade']?>" placeholder="Naturalidade" required="">
				</div>
			  
			  <div class="col-sm-4">
				Local de Residencia:
				  <input type="text" class="input-sm form-control" name="localCandidato" value="<?php echo $resultado['localResidencia']?>" placeholder="Local de Residencia" required="">
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <?php
                  
                  $query=mysql_query("SELECT * FROM tabela_turma ORDER BY idTurma");
				  $idTurma=$resultado['idTurma'];
				  $query1=mysql_query("SELECT * FROM tabela_turma where idTurma='$idTurma'");
				  
				  $r=mysql_fetch_assoc($query1);
                  ?>
			  
			  <div class="col-sm-4">
				Turma:
				  <select class="input sm form-control" name="turmaCandidato" required="">
				  <option value="<?php echo $r['idTurma']?>"><?php echo $r['nomeTurma']?></option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma']."</option>";
                      }
                      
                      ?>
					</select>
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
    
    $idUsuario = $_POST['idUsuario'];
    
    $numero = $_POST['numeroCandidato'];
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
    $turma = $_POST['turmaCandidato'];
    $categoriacandidato = $_POST['categoriaCandidato'];
    
				//Inserindo os dados do formulario usereditar na tabela usuarios
				
					
				 mysql_query("UPDATE tabela_estudante set idTurma = $turma, nome = '$nome', apelido = '$apelido', email = '$email', contacto = '$contacto', dataNascimento = '$data', numeroBI = '$bi', sexo = '$sexo', estadoCivil = '$estadocivil', pais = '$pais', naturalidade = '$naturalidade', localResidencia = '$local' ,dataModificacao = NOW() WHERE idEstudante=$idEstudante");
               
				$linha=mysql_affected_rows();
				
                mysql_query("UPDATE  tabela_usuarios set nome = '$nome $apelido', dataModificacao = NOW() WHERE idUsuario='$idUsuario'");
                $linha1=mysql_affected_rows();
				
				if ($linha> 0 or  $linha1> 0){
				$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Dados do Usuário <strong>$nomecandidato</strong> editados com sucesso!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: listarEstudantes.php");
				}
				else{
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															 <strong>Erro ao editar os dados</strong> ! ".mysql_error()."
														</div>
												   	</div>";
													
		
				//Manda o usuario para a tela de login
				header("Location: listarEstudantes.php");
				}
			}					                

?>
    
<?php
	include_once("rodape.php");
?>

<script type="text/javascript">
	
</script>