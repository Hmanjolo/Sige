<?php
require_once("conexao.php");
session_start();
				
?>
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
    $classe = $_POST['classe'];
    $pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$contactoEncarregado = $_POST['contactoEncarregado'];
	$Escola_Saida=$_POST['Escola_Saida'];
	$Ano_Saida=$_POST['Ano_Saida'];
	$Classe_frequentada=$_POST['Classe_frequentada'];
	$Turma_frequentada=$_POST['Turma_frequentada'];
    
    //Carregar foto
    if (isset($_POST['foto'])) {
    	$extensao=strtolower(substr($_FILE['foto']['name'], -4));
    	$novoNome=md5(time()).$extensao;
    	$diretorio="Fotos/";
    	move_uploaded_file($_FILE['foto']['tmp_name'], $diretorio.$novoNome);
    }

    //Verificando os usuários já existentes na Base de Dados
	//Para evitar a duplicação dos dados 
	$verifica_nome = "SELECT * FROM tabela_usuarios WHERE (nome = '$nome_resultado')";
	$verifica_Estudante = "SELECT * FROM tabela_Estudante WHERE (numeroBI = '$bicandidato')";
	$verifica_Estudante1 = "SELECT * FROM tabela_Estudante WHERE (email = '$emailcandidato')";
	$verifica_Estudante2 = "SELECT * FROM inscricao WHERE (email = '$emailcandidato')";
	$verifica_Estudante4 = "SELECT * FROM inscricao WHERE (contacto = '$contactoCandidato')";
	$verifica_Estudante3 = "SELECT * FROM inscricao WHERE (numeroBI = '$bicandidato')";
	$nome_resultado = mysql_query($verifica_nome);
	$Estudante_resultado = mysql_query($verifica_Estudante);
	$Estudante_resultado1 = mysql_query($verifica_Estudante1);
	$Estudante_resultado2 = mysql_query($verifica_Estudante2);
	$Estudante_resultado3 = mysql_query($verifica_Estudante3);
	$Estudante_resultado4 = mysql_query($verifica_Estudante4);
	if(mysql_num_rows($Estudante_resultado) > 0){
			$_SESSION['mensagem'] = "
													<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'> 
															Estudante já existente no Sistema!
														</div>
												   	</div>
											   	";
            }
	elseif(mysql_num_rows($Estudante_resultado4) > 0){

			$_SESSION['mensagem'] = "<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															O Celular já existe no Sistema!
														</div>
												   	</div>";
            }
	elseif(mysql_num_rows($Estudante_resultado2) > 0){

			$_SESSION['mensagem'] = "<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															O Email já existe no Sistema!
														</div>
												   	</div>";
            }
	elseif(mysql_num_rows($Estudante_resultado1) > 0){

			$_SESSION['mensagem'] = "<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															O Email já existe no Sistema!
														</div>
												   	</div>";
            }else{
	if(mysql_num_rows($Estudante_resultado3) > 0){
		
			$_SESSION['mensagem'] = "	<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															O Estudante já existente no Sistema!
														</div>
												   	</div>";
	}
	elseif(mysql_num_rows($Estudante_resultado) > 0){

			$_SESSION['mensagem'] = "
													<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															O Estudante já existente no Sistema!
														</div>
												   	</div>";
   }else{

			

				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				 $inserir = mysql_query("INSERT INTO inscricao (nome, apelido, email, contacto, dataNascimento, numeroBI, sexo, estadoCivil, pais, naturalidade, localResidencia,idNivelAcesso , classe, pai, mae, contactoEncarregado, `Escola_Saida`, `Ano_Saida`, `Classe_frequentada`, `Turma_frequentada`, dataCadastro) VALUES ('$nomecandidato','$apelidocandidato', '$emailcandidato','$contactocandidato', '$datacandidato', '$bicandidato', '$sexocandidato', '$estadocivilcandidato', '$paiscandidato', '$naturalidadecandidato', '$localcandidato', '4', '$classe', '$pai', '$mae', $contactoEncarregado,'$Escola_Saida', '$Ano_Saida', '$Classe_frequentada', '$Turma_frequentada', NOW())");
    
				if($inserir){
					$_SESSION['mensagem'] = "
													<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Estudante <strong>$nomecandidato</strong> inscrito no sistema, para concluir a inscriçao deposite o valor e dirija-se a secretaria para confirmar!
														</div>
												   	</div>";
				}else{
					$_SESSION['mensagem'] = "
													<div class='col-md-12 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Estudante não cadastrado!
														</div>
												   	</div>";
													echo mysql_error();
				}
			
		
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="pt">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="Sistema de Gestao da Escolar ARC">
				<meta name="author" content="Haggy Manjolo">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				    

				<title>Colégio ARC</title>
				<link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
				<link type="text/css" href="bootstrap/css/manjolo.css" rel="stylesheet">
				<link type="text/css" href="bootstrap/css/side.css" rel="stylesheet">
				<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
				<script type="text/javascript" src="bootstrap/js/manjolo.js"></script>
				<script src="bootstrap/js/jquery.js"></script>
				<script src="bootstrap/js/bootstrap.min.js"></script>
				<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
			</head>
			<body>
				<div class="container-fluid">
				<div class="row-fluid">
				<div class="col col-lg-H col-md-H col-sm-H haggy">
					
				    <div class="panel panel-default panel-table">
				        <div class="panel-heading" >
							   
							<p>	              	
					            <div class="divH"><label>Formulario de Inscricao dos Estudantes</label></div>  
					        </p> 
						</div>
						<div class="panel-body">
				       	
				          <form class="form-horizontal" role="form" name="cadastrarEstudante" method="POST" >
						  	<div class="col-sm-12">
							  
							  <div class="form-group" role="alert">
							  <?php
							  if(isset($_SESSION['mensagem'])){
									echo $_SESSION['mensagem'];
									unset($_SESSION['mensagem']);
								}			  
							  ?>
							  
							  </div>
							</div>
							
							<div class="col-sm-12" >
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
								CPF:
								  <input type="text" class="input-sm form-control" name="biCandidato" maxlength="13" placeholder="CPF" required="">
								</div>
							</div>
				         </div>
				          <div class="col-sm-12">
							  <div class="form-group">
							  
							  <div class="col-sm-4">
								Contato:
								  <input type="text" class="input-sm form-control" name="contactoCandidato" maxlength="9" placeholder="Contato" required="">
								</div>
								<div class="col-sm-4">
								E-mail:
								  <input type="email" class="input-sm form-control" name="emailCandidato" maxlength="50" placeholder="E-mail" required="">
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
									  <option value="Solteiro/a">Divorciado(a)</option>
									  <option value="Solteiro/a">União estável</option>
									  
									</select>
								</div>
								<div class="col-sm-4">
								País:
								  
								  <select class="input sm form-control" name="paisCandidato" required="">
								  	<option value="">Selecione aqui</option>
									  <option value="Moçambique">Brasil</option>
									
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
								<div class="col-sm-4">
								Classe da inscrição:
								  <select class="input sm form-control" name="classe" required>
								  	<option value="">Selecione aqui</option>
									  <option value="8">Maternal </option>
									  <option value="9">Infantil 1</option>
									  <option value="10">Infantil 2</option>
									  <option value="11">1º Ano</option>
									  <option value="12">2º Ano</option>
									  <option value="12">3º Ano</option>
									  <option value="12">5º Ano</option>
									  <option value="12">Outro</option>
									</select>
								</div>
							  </div>
							</div>
							<!-- <div class="col-sm-12" >
							  <div class="form-group">
								
								<div class="col-sm-4">
								Escola de origem:
								  <input type="text" class="input-sm form-control" name="Escola" required >
								</div>
								<div class="col-sm-4">
								Ano:
								  <input type="date" max="1999" class="input-sm form-control" name="Ano" required >
								</div>
								
							</div>	
							</div><p></p> -->
							<!-- <div class="col-sm-12" >
							  <div class="form-group">
								
								<div class="col-sm-4">
								Foto:
								  <input type="file" class="input-sm form-control" name="foto" required >
								</div>
								
							</div>	
							</div><p></p> -->
							<div class="col-sm-12">
							  				
								<div class='divH'>
														<div class='alert alert-info text-center' role='alert'>
														
															<label>Encarregados de Educaçao</label>
														</div>
							  </div>
							  
							</div>
							<div class="col-sm-12">
							  <div class="form-group">
							  <div class="col-sm-6">
								Pai:
								  <input type="text" class="input-sm form-control" name="pai" maxlength="35" placeholder="Nome do pai" required="">
								</div>
							  <div class="col-sm-6">
								Mãe:
								  <input type="text" class="input-sm form-control" name="mae" maxlength="35" placeholder="Nome da mãe" required="">
								</div>
															
							  </div>
							</div>
							<div class="col-sm-12">
							  <div class="form-group">
							  
							  <div class="col-sm-4">
								Contato:
								  <input type="text" class="input-sm form-control" name="contactoEncarregado" maxlength="9" placeholder="Contato" required="">
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
								Nome da escola:
								  <input type="text" class="input-sm form-control" name="Escola_Saida" maxlength="50" placeholder="Ex: Escola primária Julius Nherere - Beira" required>
								</div>
							  <div class="col-sm-2">
								Ano de saida:
								  <input type="text" class="input-sm form-control" name="Ano_Saida" maxlength="4" placeholder="Ex: 2017" required>
								</div>
							  <div class="col-sm-4">
								Classe frequentada:
								  <select class="input sm form-control" name="Classe_frequentada" >
								  	<option value="">Selecione aqui</option>
									  <option value="8">Maternal </option>
									  <option value="9">Infantil 1</option>
									  <option value="10">Infantil 2</option>
									  <option value="11">1º Ano</option>
									  <option value="12">2º Ano</option>
									  <option value="12">3º Ano</option>
									  <option value="12">5º Ano</option>
									  <option value="12">Outro</option>
									</select>
								</div>
								<div class="col-sm-2">
								Turma:
								  <input type="text" class="input-sm form-control" name="Turma_frequentada" maxlength="3" placeholder="Ex: A" >
								</div>							
							  </div>
							</div>
							
								<div class="col-sm-6 col col-xs-6 text-left">
								  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
								</div>
								<div class="col-sm-6 col col-xs-6 text-right"> 
								  <button type="submit" name="cadastrarEstudante" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
								</div>
								<p class="clearfix">
								</p>
								<p class="clearfix">
								</p>
								<p class="clearfix">
								</p>
								<p class="clearfix">
								</p>
							</form>
				        </div>
						</div>
						</div>
					</div>
				</div><!-- /container -->			
			</body>
</html>			
    
<?php
	include_once("rodape.php");
?>