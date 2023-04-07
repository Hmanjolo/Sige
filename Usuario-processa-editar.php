<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");
$idUsuario 				= $_POST["idUsuario"];
$nome 				= $_POST["nome"];
$email 				= $_POST["email"];
$usuario 			= $_POST["usuario"];
$senha 				= $_POST['senha'];
$confirmacao 		= $_POST['confirmacao'];
$nivel_de_acesso 	= $_POST["nivel_de_acesso"];


if($senha === $confirmacao){

	$senha = md5($_POST["senha"]);
	
	$query = mysql_query("UPDATE tabela_usuarios set nome ='$nome', senha = '$senha', idNivelAcesso = '$nivel_de_acesso', dataModificacao = NOW() WHERE idUsuario='$idUsuario'");

	$confirmacao = mysql_query($query);

	$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-success' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Usuário <strong> $nome</strong> editado com sucesso
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de notificacao
		header("Location: listarUsuarios.php");
}else{
	
			$_SESSION['mensagem'] = "<br><br>
												<div class='col-md-10 col-md-offset-1'>
													<div class='alert alert-danger' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														As senhas do camo <strong>Senha</strong> e <strong>Conf. Senha</strong> nao coinscidem!
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de editar usuario
		header("Location: Usuario-editar.php");
}

?>
