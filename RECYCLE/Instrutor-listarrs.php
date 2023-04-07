<?php
	include_once("principal.php");
include_once("portal-menu.php");
	
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
?>

	 <div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Listar  Instrutor</h3>
                  </div>
               
                </div>
              </div>
             <div class="panel-body">
             <div class="table-responsive">
             	<div class="panel panel-info filterable">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                   <?php 
			
				$resultado = mysql_query("SELECT *, tabela_nivel_acesso.nomeNivelAcesso as nomenivel FROM tabela_instrutores INNER JOIN tabela_nivel_acesso ON tabela_nivel_acesso.idNivelAcesso = tabela_instrutores.idNivelAcesso ORDER BY 'idInstrutores'");?>
				<label for="texto">Número de Instrutores: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
                  </div>
                </div>
              </div>
			  
			<form name="form1" method="post" action="">
			    <div class="panel-body">
                <table class="table table-condensed table-striped table-bordered table-list table-hover">
                  <thead>
                    <tr class="filters">
					<th><input type="text" class="form-control" placeholder="Nome" disabled></th>
					<th>Apelido</th>
					<th>Data de Nascimento</th>
					<th>Numero de BI</th>
                    <th>Estado Civil</th>
                    <th>Naturalidade</th>
                    <th>Local Residencia</th>
					 <th>Leciona</th>
                        <th>Acções</th>
				  </tr>
				</thead>
				<tbody class="searchable">
			<?php 
			
				$resultado = mysql_query("SELECT *, tabela_nivel_acesso.nomeNivelAcesso as nomenivel FROM tabela_instrutores INNER JOIN tabela_nivel_acesso ON tabela_nivel_acesso.idNivelAcesso = tabela_instrutores.idNivelAcesso ORDER BY 'idInstrutores'");
			  
				while($linhas = mysql_fetch_array($resultado)){
					echo "<tr>";
						
                        echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['apelido']."</td>";
						echo "<td>".$linhas['DataNasci']."</td>";
                        echo "<td>".$linhas['numerobi']."</td>";
                        echo "<td>".$linhas['estadocivil']."</td>";
                        echo "<td>".$linhas['naturalidade']."</td>";
                        echo "<td>".$linhas['localResidencia']."</td>";
                        echo "<td>".$linhas['codigoCarta']."</td>";
						
						?>
						<td> 
						<a href='Instrutor-editar.php?idInstrutores=<?php echo $linhas['idInstrutores']; ?>'><button type='button' class='btn btn-sm btn-warning'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
						
						<button type='button' class='btn btn-sm btn-danger' data-title="Delete" data-toggle="modal" data-target="#delete" data-whatever="<?php echo $linhas['idInstrutores'];?>"><span class="glyphicon 
glyphicon-trash"></span> Apagar</button>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	  </form>
	</div>
             </div>
	</div>
</div> <!-- /container -->

<!-- Inicio Modal Apagar -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Dados</h4>
				</div>
				<form name="form" method="POST" action="Usuario-processa-apagar.php">
				<div class="modal-body">
				<input type="hidden" name="idUsuario" class="form-control" id="id">
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Deseja Eliminar?</div>
				</div>
				<div class="modal-footer ">
				<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Sim</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Não</button>
				 </div></div> </div></div> </form>
				<!-- Fim Modal -->


				<script type="text/javascript">
		$('#delete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') 
		  var modal = $(this)
		  //modal.find('.modal-title').text('Editar Usuario - ID: ' + recipient)
		  modal.find('#id').val(recipient)
		
		  })
	</script>

<?php
	include_once("rodape.php");
?>