<?php
session_start();
$usuariot = $_POST['usuario'];
$senhat = $_POST['senha'];
include_once("conexao.php");

$senhat = md5($_POST['senha']);
$result = mysql_query("SELECT * FROM tabela_usuarios WHERE md5(idUsuario)=md5('$usuariot') AND senha='$senhat' AND estado='Activo' LIMIT 1");

$resultado = mysql_fetch_assoc($result);
if(empty($resultado)){
	//Mensagem de Erro
	$_SESSION['loginErro'] = "<br>
								
								Usuário ou Senha Inválido
										
							  <br>";
	
	//Manda o usuario para a tela de login
	header("Location: index.php");
}else{
	//Define os valores atribuidos na sessao do usuario
	$_SESSION['usuarioId'] 			= $resultado['idUsuario'];
	$_SESSION['usuarioNome'] 		= $resultado['nome'];
	
	$_SESSION['usuarioSenha'] 		= $resultado['senha'];
	 
	$_SESSION['usuarioLogin'] 		= $resultado['idUsuario'];
	$_SESSION['usuarioNivelAcesso'] = $resultado['idNivelAcesso'];
	if($_SESSION['usuarioNivelAcesso'] == 1 || $_SESSION['usuarioNivelAcesso'] == 2  || $_SESSION['usuarioNivelAcesso'] == 3  || $_SESSION['usuarioNivelAcesso'] == 4){
        header("Location: inicio.php");
	}
}
?>