<?php

	include_once("principal.php");
	session_start();
	include_once("seguranca.php");
	include_once("conexao.php");

	//Declarando as variaveis para receber os dados dos formulario usercadastrar
	$tema 				= $_POST["tema"];
	$data 				= $_POST["data"];
	$id_Relacao         = $_SESSION['id_Relacao'];
	$Bimestre           = $_SESSION['Bimestre'];
    $idUsuario          = $_SESSION['usuarioId'];

    //Inserindo os dados do formulario usercadastrar na tabela usuarios
	$query = mysql_query("INSERT INTO conteudo (tema, data, id_relacao, bimestre, created_by) VALUES ('$tema', '$data', '$id_Relacao', '$Bimestre', '$idUsuario')");
    $confirmacao = mysql_query($query);
    if($confirmacao){
        $_SESSION['mensagem'] = "
            <div class='col-md-9 col-md-offset-0'>
                <div class='alert alert-success' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
                        Conteúdo criado com sucesso!
                </div>
            </div>
        ";
    }else{
        $_SESSION['mensagem'] = "
            <div class='col-md-9 col-md-offset-0'>
                <div class='alert alert-danger' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
                        Erro na criação do Conteúdo !
                </div>
            </div>
        ";
    }
		
	//Manda o usuario para a tela de login
	header("Location: conteudo.php");
				
?>