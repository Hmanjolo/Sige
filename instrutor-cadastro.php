 <?php
	include_once("principal.php");
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
	            <div class="divH"><label>Formulario de Cadastro do Professor</label></div>  
	        </p> 
		</div>
		<div class="panel-body">
          <form class="form-horizontal" name="cadastrarProfessor" method="POST" >
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		
			<div class="col-sm-12">
			  <div class="form-group">
				
				<div class="col-sm-4">
				Nome:
				  <input type="text" class="input-sm form-control" name="nomeCandidato" maxlength="40" placeholder="Nome Completo" required="" >
				</div>
				<div class="col-sm-4">
				Apelido:
				  <input type="text" class="input-sm form-control" name="apelidoCandidato" maxlength="40" placeholder="Apelido" required="" >
				</div>
				<div class="col-sm-4">
				Número de BI:
				  <input type="text" class="input-sm form-control" name="biCandidato" maxlength="13" placeholder="Número de BI" required="">
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
				Contato:
				  <input type="text" class="input-sm form-control"  name="contactoCandidato" maxlength="9" placeholder="Contato" required="">
				</div>
				<div class="col-sm-4">
				Data de Nascimento:
				  <input type="Date" class="input-sm form-control" name="dataCandidato" placeholder="Ex: <?php echo Date("Y-m-d");?> " Min="1950-01-01" Max="2017-01-01" required="">
				</div>
				
			  </div>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
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
					  <option value="Solteiro/a">Viúvo</option>
					  <option value="Solteiro/a">Divorciado(a)</option>
					  <option value="Solteiro/a">União estável</option>
					  
					</select>
				</div>
				<div class="col-sm-4">
				País:
				  
				  <select class="input sm form-control" name="paisCandidato" required="">
				  	<option value="">Selecione aqui</option>
					  <option value="Casado/a">Brasil</option>
					  
					</select>
				</div>
				
			  </div>
			</div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			 
			  <div class="col-sm-4">
				Naturalidade:
				  <input type="text" class="input-sm form-control" name="naturalidadeCandidato" maxlength="30" placeholder="Naturalidade" required="">
				</div>
			  
			  <div class="col-sm-4">
				Local de Residencia:
				  <input type="text" class="input-sm form-control" name="localCandidato" maxlength="30" placeholder="Bairro" required="">
				</div>
				<?php
                  
                  $query=mysql_query("SELECT * FROM disciplina ORDER BY Nome");
                  ?>
			  
			  
			  </div>
			</div>
				<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <button type="submit" name="cadastrarProfessor" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Gravar</button>
				</div>
				</form>
		</div>	  
		</div>	  
		</div>
</div>
</div>
    
    <?php 

if(isset ($_POST['cadastrarProfessor'])){
    
    
    $nome = $_POST['nomeCandidato'];
    $apelido = $_POST['apelidoCandidato'];
    $email = $_POST['emailCandidato'];
    $contacto = $_POST['contactoCandidato'];
    $dob = $_POST['dataCandidato'];
    $bi = $_POST['biCandidato'];
    $sexo = $_POST['sexoCandidato'];
    $estado = $_POST['estadocivilCandidato'];
    $pais = $_POST['paisCandidato'];
    $naturalidade = $_POST['naturalidadeCandidato'];
    $Bairro = $_POST['localCandidato'];
    $Disciplina = $_POST['Disciplina'];
    
    
    
   
    
   
    
    
    
    //Verificando os usuários já existentes na Base de Dados
	//Para evitar a duplicação dos dados 
	$verifica_nome = "SELECT * FROM professor WHERE (nome = '$nome_resultado')";
	$verifica_Professor = "SELECT * FROM professor WHERE (BI = '$bi')";
	$verifica_Professor1 = "SELECT * FROM professor WHERE (numeroCandidato = '$numerocandidato')";
	$nome_resultado = mysql_query($verifica_nome);
	$Professor_resultado = mysql_query($verifica_Professor);
	$Professor_resultado1 = mysql_query($verifica_Professor1);
	if(mysql_num_rows($Professor_resultado) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Professor já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: instrutor-cadastro.php");
            }
	if(mysql_num_rows($Professor_resultado1) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Professor já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Instrutor-cadastro.php");
            }
	if(mysql_num_rows($nome_resultado) > 0){
		
			$_SESSION['mensagem'] = "	<div class='form-group'>
														<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Professor já existente no Sistema!
														</div>
												   	</div>
											   	</div>";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Instrutor-cadastro.php");
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
			header("Location: Instrutor-cadastro.php");
            }
			if(mysql_num_rows($Professor_resultado) > 0){

			$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															Professor já existente no Sistema!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Instrutor-cadastro.php");
            }else{

			if($senha === $confirmacao){

				$senha = md5($_POST["senha"]);

				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				$inserir = mysql_query("INSERT INTO Professor (idUsuario,nome, apelido, email, contacto, dob, BI, sexo, estado, pais, naturalidade, Bairro, dataCadastro) VALUES ('$email','$nome','$apelido', '$email','$contacto', '$dob', '$bi', '$sexo', '$estado', '$pais', '$naturalidade', '$Bairro', NOW())");
				
                $inserir1 = mysql_query("INSERT INTO tabela_usuarios (idUsuario, nome,senha, estado, idNivelAcesso , dataCadastro) VALUES ('$email', '$nome $apelido', MD5('1234'), 'Activo', '3', NOW())");
                
				if ($inserir & $inserir1) {
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Professor <strong>$nome $apelido</strong> cadastrado com sucesso!
														</div>
												   	</div>";
				} else {
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															A operação falhou! ".mysql_error()."
														</div>
												   	</div>";
				}
				//Manda o usuario para a tela de login
				header("Location: Instrutor-listar.php");
				
			}
		
		}
	}
    
    

    
    
}



?>
    
<?php
	include_once("rodape.php");
?>