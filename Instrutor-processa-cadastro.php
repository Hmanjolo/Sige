<?php

	include_once("principal.php");
	session_start();
	include_once("seguranca.php");
	include_once("conexao.php");

	

	if(mysql_num_rows($nome_resultado) > 0){
		
			$_SESSION['mensagem'] = "	<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'> 
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Nome já existente no Sistema!
														</div>
												   	</div>";
		
			//Manda o usuario para a tela de cadastro
			header("Location: Usuario-cadastro.php");
	}
	else{
		$verifica_email = "SELECT * FROM tabela_usuarios WHERE (email = '$email')";
		$email_resultado = mysql_query($verifica_email);
		if(mysql_num_rows($email_resultado) > 0){

			$_SESSION['mensagem'] = "<p></p>
													<div class='divH'>
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
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Usuário <strong>$nome</strong> cadastrado com sucesso!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: Usuario-cadastro.php");
				
			}else{
		
				$_SESSION['mensagem'] = "	
													<p></p>
													<div class='divH'>
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
