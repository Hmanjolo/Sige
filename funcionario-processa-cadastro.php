<?php

	include_once("principal.php");
	session_start();
	include_once("seguranca.php");
	include_once("conexao.php");

	//Declarando as variaveis para receber os dados dos formulario usercadastrar
	$nome 				= $_POST["nome"];
	$email 				= $_POST["email"];
	$usuario 			= $_POST["usuario"];
	$senha 				= $_POST["senha"];
	$confirmacao		= $_POST["confirmacao"];
	$nivel_de_acesso 	= $_POST["nivel_de_acesso"];

    


	//Verificando os usuários já existentes na Base de Dados
	//Para evitar a duplicação dos dados 
	$verifica_nome = "SELECT * FROM tabela_usuarios WHERE (nome = '$nome')";
	$nome_resultado = mysql_query($verifica_nome);

	if(mysql_num_rows($nome_resultado) > 0){
		
			$_SESSION['mensagem'] = "	<div class='form-group'>
																<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'> 
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Nome já existente no Sistema!
														</div>
												   	</div>
											   	</div>";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Usuario-cadastro.php");
	}
	else{
		$verifica_email = "SELECT * FROM tabela_usuarios WHERE (email = '$email')";
		$email_resultado = mysql_query($verifica_email);
		if(mysql_num_rows($email_resultado) > 0){

			$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'> 
															E-mail já existente no Sistema. Por favor queira introduzir outro e-mail!
														</div>
												   	</div>
											   	";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Usuario-cadastro.php");
            }else{

			if($senha === $confirmacao){

				$senha = md5($_POST["senha"]);

				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				$query = mysql_query("INSERT INTO tabela_usuarios (nome, email, login, senha, idNivelAcesso, dataCadastro) VALUES ('$nome', '$email', '$usuario', '$senha', '$nivel_de_acesso', NOW())");
				$confirmacao = mysql_query($query);

				$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Usuário <strong>$nome</strong> cadastrado com sucesso!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: Usuario-cadastro.php");
				
			}else{
		
				$_SESSION['mensagem'] = "	
													<div class='col-md-10 col-md-offset-1'>
														<div class='alert alert-danger' role='alert'> 
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Os dados dos campos <strong>Senha</strong> e <strong>Conf. Senha</strong> não coinscidem!
														</div>
												   	</div>";
		
			//Manda o usuario para a tela de login
			header("Location: Usuario-cadastro.php");
	}

		
		}
	}
        
?>
