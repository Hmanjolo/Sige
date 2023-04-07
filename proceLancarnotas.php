<?php
session_start();
include_once("conexao.php");

//echo $_SERVER['REQUEST_URI'];
$dados=explode("?", $_SERVER['REQUEST_URI']);
$dados=$dados[1];

$count_idEstudante=substr_count($dados, "idEstudante");
$i=1;
$contArray=0;
$Notas=explode("&", $dados);
while ($i<=$count_idEstudante ) {
	$valor1=$Notas[$contArray];
	$idEstudante=explode("=", $valor1);
	$idEstudante=$idEstudante[1];
	$contArray++;
// echo $idEstudante;
	$valor1=$Notas[$contArray];
	$texte1=explode("=", $valor1);
	$texte1=$texte1[1];
	$contArray++;
//echo "<br>".$texte1;
	$valor1=$Notas[$contArray];
	$texte2=explode("=", $valor1);
	$texte2=$texte2[1];
	$contArray++;
//echo "<br>".$texte2;
	$valor1=$Notas[$contArray];
	$Trabalho1=explode("=", $valor1);
	$Trabalho1=$Trabalho1[1];
	$contArray++;
//echo "<br>".$Trabalho1;
	$valor1=$Notas[$contArray];
	$Trabalho2=explode("=", $valor1);
	$Trabalho2=$Trabalho2[1];
	$contArray++;
//echo "<br>".$Trabalho2;
	$valor1=$Notas[$contArray];
	$TP=explode("=", $valor1);
	$TP=$TP[1];
	$contArray++;
//echo "<br>".$TP;
	$valor1=$Notas[$contArray];
	$idNota=explode("=", $valor1);
	$idNota=$idNota[1];
	$contArray++;
//echo "<br>".$idNota."<br><br>";

$Bimestre=$_SESSION['Bimestre'];
$id_Relacao=$_SESSION['id_Relacao'];


if (is_numeric($idNota)) {
	$classificacao= $texte1.$texte2.$Trabalho1.$Trabalho2.$TP;
	if (substr_count(strtolower($classificacao),"v")>1)
		$classificacao = 'Reprovado';
	elseif(strlen($classificacao)<1)
		$classificacao = '';
	else
		$classificacao = 'Aprovado';
try {
	$sql = "UPDATE `tabela_notas` SET `Teste1` = '$texte1', `Teste2` = '$texte2', `Trabalho1` = '$Trabalho1', `Trabalho2` = '$Trabalho2', `TP` = '$TP', classificacao = '$classificacao', `DataModificacao` = NOW() WHERE `tabela_notas`.`idNota` = $idNota";
	
	$query=mysql_query($sql);
	if (mysql_affected_rows()<=0) {
		
	} else {
		print(mysql_error());
}
} catch (Exception $e) {
	
}
	
} else {
	try {
		$sql = "INSERT INTO `tabela_notas` (`idEstudante`, `id_Relacao_Disciplina`, `Teste1`, `Teste2`, `Trabalho1`, `Trabalho2`, `TP`, `Bimestre`, `DataCadastro`, `DataModificacao`) VALUES ('$idEstudante', '$id_Relacao', '$texte1', '$texte2', '$Trabalho1', '$Trabalho2', '$TP', '$Bimestre', NOW(),null)";
		$query=mysql_query($sql);	
		if ($query) {
		      $_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Notas atualizadas com sucesso!
														</div>
												   	</div>";
		
		} else {
			print(mysql_error());
		}
	} catch (Exception $e) {
		
	}
	
}

	$i++;
}
header("Location: lancarnotas.php");
//$idEstudante= $_GET['idEstudante'];
/*$idNota= $_GET['idNota'];
$texte1 = $_GET['nota1'];
$texte2 = $_GET['nota2'];
$Trabalho1 = $_GET['Trab1'];
$Trabalho2 = $_GET['Trab2'];
$TP= $_GET['TP'];*/


/*
*/


?>