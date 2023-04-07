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
                <div class="panel-heading">
                    <p>
                    <div class="divH"><label>Notas de Frequencia ->
                        </label><?php echo' '; echo $linhas['id_Disciplina']; echo' ';  echo $linhas['nomeTurma'];?> ->
                        <?php echo $Bimestre;?></div>
                    </p>
                    <div class="text-right divH" style='padding-bottom:4px'>
                		<a href="#"><button type="button" class="text-right btn btn-sm btn-info" onclick="$('#modalConteudo').modal('show')"><span class="glyphicon glyphicon-plus"></span> </button></a>
                	</div>
                </div>

                <div class="panel-body">

                    <form name="form1" method="GET" ondblclick="lancar()" action="proceLancarnotas.php">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped table-bordered  table-list table-hover">
                                <thead class="bg-primary">
                                    <tr class="filters">
                                        <th>Tema</th>
                                        <th>Data</th>
                                        <th>Acção</th>
                                    </tr>
                                </thead>
                                <tbody class="searchable">

                                    <?php 
					   $resultado=mysql_query("SELECT * FROM conteudo where id_Relacao='$id_Relacao' AND bimestre = '$Bimestre' ORDER BY data");
					  
				while($linhas2 = mysql_fetch_array($resultado)){
					echo "<tr>";
					echo "<td>".$linhas2['tema']."</td>";
					echo "<td>".$linhas2['data']."</td>";
					echo "<td class=''><a href='presencas.php?id=".$linhas2['id']."'<i class='glyphicon glyphicon-eye-open'></i></td>";
					echo "</tr>";
						}
				?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6 col col-xs-6 text-left">
                            <button type='button' onclick="Voltar()" class='btn  btn-info'><span
                                    class="glyphicon glyphicon-remove"></span>Cancelar</button>
                        </div>
                        <div class="col-sm-6 col col-xs-6 text-right" hidden>
                            <button type="submit" name="cadastrarEstudante" class="btn btn-success"><span
                                    class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
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
<div class='modal fade' tabindex='-1' role='dialog' id='modalConteudo'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span
                        aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Adicionar conteúdo</h4>
            </div>
            <form class="form_cadastro" action="processa-cadastro-presenca.php" method='POST'>
                <div class='modal-body'>

                    <div class="row">
                        <div class="col col-md-12">
                            <div class="col col-md-9">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Tema</label>
                                    <input type="text" onload="$(this).is('focus');" minlength="7" required id="tema"
                                        name="tema" maxlength="70" value="" class="form-control" autocomplete="no">
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Data</label>
                                    <div class="input-group">
                                        <input type="text" onfocus="(this.type = 'date')" required
                                            onblur="(this.type = 'text')" id="dataHoraInicio" name="data" value=""
                                            min="" max="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
                    <button type='submit' class='btn btn-primary'>Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>