<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");
$idUsuario 				= $_POST["idUsuario"];
$senha 				= $_POST['senha'];
$confirmacao 		= $_POST['confirmacao'];


if($senha === $confirmacao){

	$senha = md5($_POST["senha"]);
	
	$query = mysql_query("UPDATE tabela_usuarios set senha = '$senha', dataModificacao = NOW()");

	$confirmacao = mysql_query($query);

	$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-success' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Senha actualizado com sucesso
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de notificacao
		header("Location: senha.php");
}else{
	
			$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-danger' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														A senha do campo <strong>Senha</strong> e <strong>Confirmar Senha</strong> não coinscidem!
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de editar usuario
		header("Location: senha.php");
}

?>
