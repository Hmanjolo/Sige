<?php
ob_start();
	include_once("principal.php");
	include_once("medias.php");
?>
<?php
	$id_Relacao=$_SESSION['id_Relacao'];
	$Bimestre=$_SESSION['Bimestre'];
    $idUsuario=$_SESSION['usuarioId'];
	if($_SESSION['usuarioNivelAcesso']=='1' OR $_SESSION['usuarioNivelAcesso']=='5')
		$query=mysql_query("SELECT * FROM `detalhes_disciplina` INNER JOIN tabela_turma ON detalhes_disciplina.idTurma=tabela_turma.idTurma WHERE detalhes_disciplina.id_Relacao='$id_Relacao'");
	else if($_SESSION['usuarioNivelAcesso']=='3')
		$query=mysql_query("SELECT * FROM `detalhes_disciplina` INNER JOIN tabela_turma ON detalhes_disciplina.idTurma=tabela_turma.idTurma INNER JOIN professor ON professor.BI=detalhes_disciplina.id_Professor WHERE detalhes_disciplina.id_Relacao='$id_Relacao'");
	$linhas=mysql_fetch_array($query);
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}

?>

<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
              <p>
                	<div class="divH"><label>Notas de Frequencia -> </label><?php echo' '; echo $linhas['id_Disciplina']; echo' ';  echo $linhas['nomeTurma'];?> -> <?php echo $Bimestre;?></div>
              </p> 
        </div>

			<div class="panel-body"> 
			
            <form name="form1" method="GET" ondblclick="lancar()" action="proceLancarnotas.php" >
			<div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered  table-list table-hover">
                  <thead class="bg-primary">
                    <tr class="filters">
					<th>Nome Estudante</th>
					<th>Teste 1</th>	
					<th>Teste 2</th>
					<th>Media Testes</th>
					<th>Trab 1</th>
					<th>Trab 2</th>
					<th>Media Trabalhos</th>
					<th>Faltas</th>
					<th>Média Geral</th>
					<th>Classificação</th> 
						  </tr>
				</thead>
				<tbody class="searchable">

					<?php 
					   $idTurma=$linhas['idTurma'];
					   $resultado=mysql_query("SELECT * FROM tabela_estudante where idTurma='$idTurma'");
					   $linhas2=mysql_num_rows($resultado);
				while($linhas2 = mysql_fetch_array($resultado)){
					$idEstudante=$linhas2['numeroBI'];
					$m=new medias($idEstudante,$id_Relacao,$Bimestre);
					echo "<tr>";
					echo "<td><input type='hidden' size='4.2'  class='form-control' id='idEstudante' name='idEstudante' value='$idEstudante'" .">".$linhas2['nome']." ".$linhas2['apelido']."</td>";
					echo "<td><input type='text' size='4.2' maxlength='5' class='form-control' id='texte1' name='texte1' value='".$m->T1."'" ."></td>";
					echo "<td><input type='text' size='4.2' maxlength='5' class='form-control' id='texte2' name='texte2' value='".$m->T2."'" ."></td>";
					echo "<td>".$m->MT."</td>";
					echo "<td><input type='text' size='4.2' maxlength='5' class='form-control' id='trab1' name='trab1' value='".$m->Trab1."'" ."></td>";
					echo "<td><input type='text' size='4.2' maxlength='5' class='form-control' id='trab2' name='trab2' value='".$m->Trab2."'" ."></td>";
					echo "<td>$m->MTrab</td>";
					echo "<td><input type='text' size='4.2' maxlength='5' class='form-control' id='TP' name='TP' value='".$m->TP."'>
					<input type='hidden' size='4.2' maxlength='5' class='form-control' id='idNota' name='idNota' value='".$m->idNota."'
					" ."></td>";
					echo "<td>".$m->M."</td>"; 
					echo "<td class='text-center'>".$m->Classificacao."</td>";
						
					echo "</tr>";
						}
				?>

			</tbody>
			</table>
			</div>
				<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <button type="submit" name="cadastrarEstudante" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
				</div>
			</form>
			
				
			</div>
    </div>
</div>
</div>
</div>


<script type="text/javascript">
	function lancar() {
		//document.getElementById("bt").submit();
		document.getElementsByTagName('form1').submit();
	}
</script>

<?php
	include_once("rodape.php");
    
?>