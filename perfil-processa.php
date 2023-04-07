<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");
//Variavel sessao
$idUsuario = $_SESSION['usuarioLogin'];
$Nivelacesso=$_SESSION['usuarioNivelAcesso'];

$NovoidUsuario = $_POST["usuario"];
$contacto = $_POST["contacto"];
$email = $_POST["email"];



	$query = mysql_query("UPDATE tabela_usuarios set  idUsuario  = '$NovoidUsuario', dataModificacao = NOW() WHERE idUsuario='$idUsuario'");
	if ($Nivelacesso==4){
		$query1 = mysql_query("UPDATE tabela_estudante set idUsuario  = '$NovoidUsuario', email  = '$email', contacto  = '$contacto', dataModificacao = NOW() WHERE idUsuario='$idUsuario'");
	}
	else if ($Nivelacesso==3){
		$query1 = mysql_query("UPDATE professor set idUsuario  = '$NovoidUsuario', Email  = '$email', Contacto  = '$contacto', dataMod = NOW() WHERE idUsuario='$idUsuario'");
	}
	else if ($Nivelacesso==2){
		$query1 = mysql_query("UPDATE funcionario set idUsuario  = '$NovoidUsuario', Email  = '$email', Contacto  = '$contacto', dataMod = NOW() WHERE idUsuario='$idUsuario'");
	}
	
	if($query && $query1){
	$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-success' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Dados actualizados com sucesso!
													</div>
											   	</div>";
		$_SESSION['usuarioId']=$NovoidUsuario;
		$_SESSION['usuarioLogin']= $NovoidUsuario;
	}else{
		$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-danger' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Dados não actualizados devido ao erro: ".mysql_error()."
													</div>
											   	</div>";
	}
		//Manda o usuario para a tela de notificacao
		header("Location: perfil.php");

