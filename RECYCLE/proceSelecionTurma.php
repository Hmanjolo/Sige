<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");
$nomeTurma = $_POST['nomeTurma'];



	$resultado = mysql_query( "SELECT * FROM `tabela_estudante` INNER JOIN tabela_turma on tabela_estudante.idTurma=tabela_turma.idTurma where nomeTurma= '$nomeTurma'");
		$num = mysql_num_rows($resultado) ;

	if(	$num =1){


		//Manda o usuario para a tela de notificacao
		header("Location: lancarnotas.php");
}else{
	

	
		//Manda o usuario para a tela de editar usuario
		header("Location: selecinaTurmaClasse.php");
}

?>