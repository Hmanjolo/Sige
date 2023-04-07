<?php
include_once("principal.php");
?>
<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
	
?>
<?php
 				$idTurma=$_SESSION['idTurma'];
				if (isset($_POST['buscar'])) {
    				$pesquisar = $_POST['PalavraChave'];
    				$resultado = mysql_query("SELECT * from tabela_estudante where idTurma='$idTurma' And Nome LIKE '$pesquisar%'");
    				if (mysql_num_rows($resultado)<1) {
    					$resultado = mysql_query("SELECT * from tabela_estudante where idTurma='$idTurma' and Apelido LIKE '$pesquisar%'");
    				}
    				if (mysql_num_rows($resultado)<1)  {
    					$resultado = mysql_query("SELECT * from tabela_estudante where idTurma='$idTurma' and numeroCandidato LIKE '$pesquisar%'");
    				}    						
				}else{
						$resultado = mysql_query("SELECT * FROM tabela_estudante where idTurma='$idTurma' ORDER BY 'idEstudante'");
				}
				unset($_POST['buscar']);
			?>
			<?php 
				$idTurma=$_SESSION['idTurma'];
				$sql = mysql_query("SELECT * FROM tabela_turma  where idTurma='$idTurma' ORDER BY 'idTurma'");
				$Turmas = mysql_fetch_array($sql);			
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Alunos</label></div>
                	<div class="text-right divH">
                		<a href="estudante-cadastro.php?usuarioId=<?php echo $_SESSION['usuarioId'] ?>"><button type='button' class='text-right btn btn-sm btn-info'><span class="glyphicon glyphicon-plus"></span> </button></a>
                	</div>
                
              </p> 
        </div>	 
        <div class="panel-body">
            	
					<form class="hidden" name="form2" method="post" action="">
						<div class="col-sm-3 form-group" >
							<input type="text" class="input-sm form-control" name="PalavraChave" maxlength="30" size='25' placeholder="Numero do processo ou nome" required="">
				    	</div>
				   		<div class="col-sm-1 col-md-1">
							<button class='btn btn-sm btn-success' name='buscar'><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
				    	</div>
					</form>
                 
             
            <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
              		<p class="hidden">
              			<label for="texto">Turma: <?php echo $Turmas['nomeTurma']; ?></label>   
								<label for="texto">Número de Estudantes: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
              		</p> 
            <div class="row-fluid">
            <div class="table-responsive">
					<form name="form1" method="post" action="">
			   			
			                <table id="Tabela" class="table table-bordered table-striped  table-responsive table-hover">
			                  	<thead class="bg-primary">
									<th>Nº de Processo</th>
									<th>Nome</th>
									<th>Apelido</th>
									<th>E-mail</th>
									<th>Contato</th>
									<!-- <th>Data Nascimento</th> -->
									<th>CPF</th>
									<!-- <th>Sexo</th> -->
									<th>Ações</th>
								</thead>
								<tbody class="searchable">
							<?php 
								while($linhas = mysql_fetch_array($resultado)){
									echo "<tr>";
			                        echo "<td>".$linhas['idEstudante']."</td>";
									echo "<td>".$linhas['nome']."</td>";
			                        echo "<td>".$linhas['apelido']."</td>";
									echo "<td>".$linhas['email']."</td>";
			                        echo "<td>".$linhas['contacto']."</td>";
									// echo "<td>".$linhas['dataNascimento']."</td>";
			                        echo "<td>".$linhas['numeroBI']."</td>";
									// echo "<td>".$linhas['sexo']."</td>";
							?>
									<td> 
									<a href='verEstudante.php?idEstudante=<?php echo $linhas['idEstudante']; ?>'><button  type='button' class='btn btn-sm btn-primary btn'><span class="glyphicon glyphicon-eye-open"></span></button></a>
									<a href='estudanteeditar.php?idEstudante=<?php echo $linhas['idEstudante']; ?>'><button type='button' class='btn btn-sm btn-warning btn'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
									<!--<button disabled type='button' class='btn btn-sm btn-danger' data-title="Delete" data-toggle="modal" data-target="#delete" data-whatever="<?php echo $linhas['idUsuario'];?>"><span class="glyphicon glyphicon-trash"></span> Apagar</button>
									-->
									<?php
											echo "</tr>";
										}
									?>
								</tbody>
		  					</table>
	  					</div>
		  			</form>
		  			
			  
				
				  <button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>	
				
				
				
				
		</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#Tabela').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado!",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros total)"
        }
    	});
	});
</script>
		
<!-- Inicio Modal Apagar -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Dados</h4>
				</div>
				<form name="form" method="POST" action="Usuario-processa-apagarEstudante.php">
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