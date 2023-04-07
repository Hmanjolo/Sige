<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");

$idUsuario 				= $_POST["idUsuario"];
$contacto 				= $_POST["contacto"];






	$query = mysql_query("UPDATE tabela_usuarios set  contacto = '$contacto', dataModificacao = NOW() WHERE idUsuario='$idUsuario'");

	

	$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-success' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Dados actualizados com sucesso
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de notificacao
		header("Location: perfil-administrador.php");

