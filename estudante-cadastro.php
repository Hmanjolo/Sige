 <?php
	require_once("principal.php");

?>
<?php
				if(isset($_SESSION['mensagem'])){
					echo $_SESSION['mensagem'];
					unset($_SESSION['mensagem']);
				}
			?>
			
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p>	              	
	            <div class="divH"><label>Formulario de Cadastro do Estudantes</label></div>  
	        </p> 
		</div>
		<div class="panel-body">
       	
          <form class="form-horizontal" role="form" name="cadastrarEstudante" method="POST" >
          <!-- <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div> -->
		  		
			<div class="col-sm-12" >
			  <div class="form-group">
			  <div class="col-sm-4">
				Número do Processo:
				  <input type="text" class="input sm form-control" name="numeroCandidato" maxlength="16" placeholder="Número de Processo" required="" autofocus="">
				</div>
				<div class="col-sm-4">
				Nome:
				  <input type="text" class="input-sm form-control" name="nomeCandidato" maxlength="40" placeholder="Nome Completo" required="" >
				</div>
				<div class="col-sm-4">
				Apelido:
				  <input type="text" class="input-sm form-control" name="apelidoCandidato" maxlength="40" placeholder="Apelido" required="" >
				</div>
				
			  </div>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				E-mail:
				  <input type="email" class="input-sm form-control" name="emailCandidato" maxlength="50" placeholder="E-mail" required="">
				</div>
			  <div class="col-sm-4">
				Contacto:
				  <input type="text" class="input-sm form-control" name="contactoCandidato" maxlength="9" placeholder="Contacto" required="">
				</div>
				<div class="col-sm-4">
				Data de Nascimento:
				  <input type="date" class="input-sm form-control" name="dataCandidato" placeholder="Ex: <?php echo Date("Y");?>-<?php echo Date("m");?>-<?php echo Date("d");?>  " required="">
				</div>
				
			  </div>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				Número de BI:
				  <input type="text" class="input-sm form-control" name="biCandidato" maxlength="13" placeholder="Número de BI" required="">
				</div>
			  <div class="col-sm-4">
				Sexo:
				  <select class="input sm form-control" name="sexoCandidato" required="">
				  	<option value="">Selecione aqui</option>
					  <option value="Masculino">Masculino</option>
					  <option value="Femenino">Feminino</option>
					  
					</select>
				</div>
				<div class="col-sm-4">
				Estado civil:
				  <select class="input sm form-control" name="estadocivilCandidato" required="">
				  	<option value="">Selecione aqui</option>
					  <option value="Casado/a">Solteiro(a)</option>
					  <option value="Solteiro/a">Casado(a)</option>
					  <option value="Solteiro/a">Viúvo(a)</option>
					  <option value="Solteiro/a">Separado(a)</option>
					  <option value="Solteiro/a">União estável(a)</option>
					  
					</select>
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				País:
				  
				  <select class="input sm form-control" name="paisCandidato" required="">
				  	<option value="">Selecione aqui</option>
					  <option value="Moçambique">Brasil</option>
					  
					</select>
				</div>
				
			  <div class="col-sm-4">
				Naturalidade:
				  <input type="text" class="input-sm form-control" name="naturalidadeCandidato" maxlength="30" placeholder="Naturalidade" required="">
				</div>
			  
			  <div class="col-sm-4">
				Local de Residencia:
				  <input type="text" class="input-sm form-control" name="localCandidato" maxlength="30" placeholder="Bairro" required="">
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <?php
                  
                  $query=mysql_query("SELECT * FROM tabela_turma ORDER BY idTurma");
                  ?>
			  
			  <div class="col-sm-4">
				Turma:
				  <select class="input sm form-control" name="turmaCandidato" required="">
				  <option value="">Selecione aqui</option>
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
				  <button type="submit" name="cadastrarEstudante" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
				</div>
			</form>
        </div>
		</div>
		</div>
	</div>
</div><!-- /container -->
    
    <?php 

if(isset ($_POST['cadastrarEstudante'])){
    
    $numerocandidato = $_POST['numeroCandidato'];
    $nomecandidato = $_POST['nomeCandidato'];
    $apelidocandidato = $_POST['apelidoCandidato'];
    $emailcandidato = $_POST['emailCandidato'];
    $contactocandidato = $_POST['contactoCandidato'];
    $datacandidato = $_POST['dataCandidato'];
    $bicandidato = $_POST['biCandidato'];
    $sexocandidato = $_POST['sexoCandidato'];
    $estadocivilcandidato = $_POST['estadocivilCandidato'];
    $paiscandidato = $_POST['paisCandidato'];
    $naturalidadecandidato = $_POST['naturalidadeCandidato'];
    $localcandidato = $_POST['localCandidato'];
    $turmacandidato = $_POST['turmaCandidato'];
    //$categoriacandidato = $_POST['categoriaCandidato'];
    
    
   
    
   
    
    
    
    //Verificando os usuários já existentes na Base de Dados
	//Para evitar a duplicação dos dados 
	$verifica_nome = "SELECT * FROM tabela_usuarios WHERE (nome = '$nome_resultado')";
	$verifica_Estudante = "SELECT * FROM tabela_Estudante WHERE (numeroBI = '$bicandidato')";
	$verifica_Estudante1 = "SELECT * FROM tabela_Estudante WHERE (numeroCandidato = '$numerocandidato')";
	$nome_resultado = mysql_query($verifica_nome);
	$Estudante_resultado = mysql_query($verifica_Estudante);
	$Estudante_resultado1 = mysql_query($verifica_Estudante1);
	if(mysql_num_rows($Estudante_resultado) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Estudante já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: estudante-cadastro.php");
            }
	if(mysql_num_rows($Estudante_resultado1) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Estudante já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: estudante-cadastro.php");
            }
	if(mysql_num_rows($nome_resultado) > 0){
		
			$_SESSION['mensagem'] = "	<div class='form-group'>
														<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Estudante já existente no Sistema!
														</div>
												   	</div>
											   	</div>";
		
			//Manda o usuario para a tela de cadastro
			header("Location: estudante-cadastro.php");
	}
	else{
		$verifica_email = "SELECT * FROM tabela_usuarios WHERE (email = '$emailcandidato')";
		$email_resultado = mysql_query($verifica_email);
		if(mysql_num_rows($email_resultado) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															E-mail já existente no Sistema. Por favor queira introduzir outro e-mail!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: estudante-cadastro.php");
            }
			if(mysql_num_rows($Estudante_resultado) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Estudante já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: estudante-cadastro.php");
            }else{

			if($senha === $confirmacao){

				$senha = md5($_POST["senha"]);

				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				 $inserir = mysql_query("INSERT INTO tabela_estudante (idUsuario,idTurma, numeroCandidato, nome, apelido, email, contacto, dataNascimento, numeroBI, sexo, estadoCivil, pais, naturalidade, localResidencia,idNivelAcesso , dataCadastro) VALUES ('$emailcandidato','$turmacandidato','$numerocandidato','$nomecandidato','$apelidocandidato', '$emailcandidato','$contactocandidato', '$datacandidato', '$bicandidato', '$sexocandidato', '$estadocivilcandidato', '$paiscandidato', '$naturalidadecandidato', '$localcandidato', '4', NOW())");
    
                $inserir1 = mysql_query("INSERT INTO tabela_usuarios (idUsuario, nome,senha, estado, idNivelAcesso , dataCadastro) VALUES ('$emailcandidato', '$nomecandidato $apelidocandidato', MD5('1234'), 'Activo', '4', NOW())");
                
				$confirmacao = mysql_query($query);
				if($inserir1&&inserir){
				$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Estudante <strong>$nomecandidato</strong> cadastrado com sucesso!
														</div>
												   	</div>";
				}else{
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Estudante não cadastrado  ! ".mysql_error()."
														</div>
												   	</div>";
				}
				//Manda o usuario para a tela de login
				header("Location: estudante-cadastro.php");
				
			}
		
		}
	}
    
    

    
    
}



?>
    
<?php
	include_once("rodape.php");
?>