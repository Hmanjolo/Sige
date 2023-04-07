<?php
ob_start();
	include_once("principal.php");
	include_once("medias.php");
?>
<?php
	$id_Relacao=$_SESSION['id_Relacao'];
	$Bimestre=$_SESSION['Bimestre'];
    $idUsuario=$_SESSION['usuarioId'];
    $id_conteudo=$_GET['id'];
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
					<th>Data</th>	
					<th>Tema</th>
					<th>Presente?</th>
						  </tr>
				</thead>
				<tbody class="searchable">

					<?php 
					   $idTurma=$linhas['idTurma'];
					   $resultado=mysql_query("SELECT *,conteudo.tema tema_conteudo, conteudo.data data_conteudo, conteudo.id id_conteudo FROM tabela_estudante LEFT OUTER JOIN conteudo ON conteudo.id = '$id_conteudo' where tabela_estudante.idTurma='$idTurma'");
				while($linhas2 = mysql_fetch_array($resultado)){
					$idEstudante=$linhas2['idEstudante'];
					$id_conteudo=$linhas2['id_conteudo'];
					$data_conteudo=$linhas2['data_conteudo'];
					$tema_conteudo=$linhas2['tema_conteudo'];
                    $resultado2=mysql_query("SELECT * FROM `presencas` WHERE id_estudante = '$idEstudante' AND id_relacao = '$id_Relacao' AND id_conteudo = '$id_conteudo'");
                        if ($rs = mysql_fetch_array($resultado2)) {
                            $id_presenca=$rs['id_presenca'];
                            $presente=$rs['presente'];
                        }
                        echo "<tr>";
					echo "<td><input type='hidden' size='4.2'  class='form-control' id='idEstudante' name='idEstudante' value='$idEstudante'" .">".$linhas2['nome']." ".$linhas2['apelido']."</td>";
					echo "<td>".$data_conteudo."</td>";
                    echo "<td>".$tema_conteudo."</td>";
                    if ($presente) {
                        echo "<td>
                                <span class='button-checkbox'>
                                    <button type='button' class='btn' data-color='primary' data-id_estudante='".$idEstudante."' data-id_presenca='".$id_presenca."' data-id_relacao='".$id_Relacao."' data-bimestre='".$Bimestre."' data-id_conteudo='".$id_conteudo."'></button>
                                    <input type='checkbox' class='hidden' checked />
                                </span>
                            </td>";
                    }else{
                        echo "<td>
                                <span class='button-checkbox'>
                                    <button type='button' class='btn' data-color='primary' data-id_estudante='".$idEstudante."' data-id_presenca='".$id_presenca."' data-id_relacao='".$id_Relacao."' data-bimestre='".$Bimestre."' data-id_conteudo='".$id_conteudo."'></button>
                                    <input type='checkbox' class='hidden'/>
                                </span>
                            </td>";
                    }
					
						
					echo "</tr>";
						}
				?>

			</tbody>
			</table>
			</div>
				<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right" hidden> 
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
    $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            //updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");
            var id_estudante = $button.data('id_estudante')
            var id_relacao = $button.data('id_relacao')
            var bimestre = $button.data('bimestre')
            var id_conteudo = $button.data('id_conteudo')
            var id_presenca = ($button.data('id_presenca')) ? $button.data('id_presenca') : 0
            var presente = (isChecked) ? 1 : 0
            $.ajax({
                type: "POST",
                url: "proceLancarPresencas.php",
                data: {'id_presenca':id_presenca,'id_estudante':id_estudante,'id_relacao':id_relacao,'bimestre':bimestre,'id_conteudo':id_conteudo,'presente':presente},
                success: function (response) {
                    //alert(response)
                }
            });
            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>

<?php
	include_once("rodape.php");
    
?>