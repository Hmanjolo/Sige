<?php 
require_once 'dompdf/autoload.inc.php';
include_once("conexao.php");
use Dompdf\Dompdf;

if (isset($_GET['BI'])) {

	$BI=$_GET['BI'];
	$result = mysql_query("SELECT * FROM tabela_estudante WHERE numeroBI = '$BI' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
	$result1 = mysql_query("SELECT * FROM conf_inscricao WHERE BI = '$BI' LIMIT 1");
	$resultado1 = mysql_fetch_assoc($result1);
	$idTurma=$resultado['idTurma'];
	$sql=mysql_query("SELECT * FROM `sige`.`tabela_turma` WHERE `idTurma` ='$idTurma'");
	$query1 = mysql_fetch_assoc($sql);
$Cabecalho = '
<html>

<link href="bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

<script src="bootstrap/js/jquery.js"></script>

<body>
<div align="center">
					<p class="clearfix">
						<img src="pics/simbolo.png" style="height: 50px;">
					</p>
					<h4>REPÚBLICA DE MOÇAMBIQUE</h4>
					<h3>MINISTÉRIO DA EDUCAÇÃO</h3>
					<h1><b>PROCESSO DO ALUNO</b></h1>
					<h5>(Ensino Primário e Secundário Geral - Curso Diurno/Noturno)</h5>
</div>
<h4><label>1.DADOS BIOGRÁFICOS</label></h4>

			  <table width="100%" border="0" class="table table-">
				  <tr>
				    <td >Numero do processo: '.$resultado['idEstudante'].'</td>
				    <td >Nome Completo: '.$resultado['nome'].' '.$resultado['apelido'].'</td>
				  </tr>
				  <tr>
				    <td >Data de Nascimento: '.$resultado['dataNascimento'].'</td>
				    <td >Sexo: '.$resultado['sexo'].' </td>
				    
				  </tr>
				  <tr>
				  	<td >Pais de Nascimento: '.$resultado['pais'].' </td>
				  	<td >Naturalidade: '.$resultado['naturalidade'].'</td>
				    
				    
				  </tr>
				  <tr>
				  	<td >Bilhete de identidade nº: '.$resultado['numeroBI'].'</td>
				  	<td >Estado Civil: '.$resultado['estadoCivil'].'</td>
				    				    				    
				  </tr>
			  	  <tr>
				  	<td >Morada: '.$resultado['localResidencia'].'</td>
				  	<td >Celular: '.$resultado['contacto'].'</td>
				    				    				    
				  </tr>
				  <tr>
				  	<td >Email: '.$resultado['email'].'</td>
				  	<td >Morada: '.$resultado['localResidencia'].'</td>
				  </tr>
				  <tr>
				  	<td colspan="2">
														<h4 class="alert-info text-center" >
														
															<b>Encarregados de Educação</b>
														</h4>
							  </td>

				  </tr>
				  <tr>
				  	<td >Pai: '.$resultado['pai'].'</td>
				  	<td >Mae: '.$resultado['mae'].'</td>
				    				    				    
				  </tr>
				  <tr>
				  	<td >Celular: '.$resultado['contactoEncarregado'].'</td>
				  				    				    
				  </tr>
				  <p >&nbsp;</p>
				  <p >&nbsp;</p>
				  <div align="right">
					<p align="center">O diretor da Escola</p>
					<p align="center">Ass_______________________________________</p>
					<p align="center">_____/____/______</p>
				  </div>	
			</table>
<h4><label>2.FREQUÊNCIA ESCOLAR</label></h4>	
			<table width="100%" class="table table-bordered">
			  <tr>
			    <th width="23%" scope="col">Data de Entrada </th>
			    <th width="24%" scope="col">Data de Saida </th>
			    <th width="40%" scope="col">Escola</th>
			    <th width="13%" scope="col">Turma</th>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>'.$resultado1['Ano_Saida'].'</td>
			    <td>'.$resultado1['Escola_Saida'].'</td>
			    
			    <td>'.$resultado1['Classe_frequentada'].' '.$resultado1['Turma_frequentada'].'</td>
			  </tr>
			  <tr>
			    <td>'.$resultado1['Data_Confirmacao'].'</td>
			    <td>&nbsp;</td>
			    <td>Escola Rei dos Reis</td>
			    
			    <td>'.$query1['nomeTurma'].'</td>
			  </tr>
			</table>
<h4><label>3.1.TRANSFERÊNCIAS</label></h4>
<h5><label>3.1.TRANSFERÊNCIA(Saida)</label></h5>	
<p align="left">Em _____/____/______, foi transferido desta escola para a de</p>
<p align="left">____________________________________________________________</p>
				  <div align="left">
					<p align="left">O diretor da Escola</p>
					<p align="left">Ass______________________________________</p>
					<p align="left">_____/____/______</p>
				  </div>
<h5><label>3.2.TRANSFERÊNCIA(Chegada)</label></h5>
<p align="left">Em _____/____/______,o aluno veio transferido da escola______</p>
<p align="left">____________________________________________________________</p>	
				  <div align="left">
					<p align="left">O diretor da Escola</p>
					<p align="left">Ass______________________________________</p>
					<p align="left">_____/____/______</p>
				  </div>		
</body>
</html>
';

$Doc="Doc.pdf";
$dompdf=new Dompdf();
$dompdf->loadHTML($Cabecalho);
//$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream($Doc,array('attachment'=>0));

}




?>