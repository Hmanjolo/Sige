<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");

$idCategoria 				= $_POST["idCategoria"];
$nome 				= $_POST["nome"];
$CodigoCarta 				= $_POST["CodigoCarta"];
$minimopesobruto 			= $_POST["minimopesobruto"];
$maximopesobruto 				= $_POST['maximopesobruto'];


	
	$query = mysql_query("UPDATE tabela_categoria set nome ='$nome', CodigoCarta = '$CodigoCarta', minimopesobruto = '$minimopesobruto', maximopesobruto = '$maximopesobruto', dataModificacao = NOW() WHERE idCategoria='$idCategoria'");

	$confirmacao = mysql_query($query);

	$_SESSION['mensagem'] = "
												<div class='col-md-9 col-md-offset-0'>
													<div class='alert alert-success' role='alert'> 
														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
														Categoria <strong> $nome</strong> editado com sucesso
													</div>
											   	</div>";
	
		//Manda o usuario para a tela de notificacao
		header("Location: listarcategaria.php");
