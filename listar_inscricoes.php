<?php
include_once("principal.php");

?>
<link type="text/css" href="bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.dataTables.min.js"></script>
<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
	
?>
<?php
 				
				if (isset($_POST['buscar'])) {
    				$pesquisar = $_POST['PalavraChave'];
    				$resultado = mysql_query("SELECT * from inscricao where Nome LIKE '$pesquisar%' or Apelido LIKE '$pesquisar%'");   						
				}else{
						$resultado = mysql_query("SELECT * from inscricao");
				}
				unset($_POST['buscar']);

			?>

<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Incriçoes</label></div>
                	<div class="text-right divH">
                		<a href="inscricoes.php"><button type='button' class='text-right btn btn-sm btn-info'><span class="glyphicon glyphicon-plus"></span> </button></a>
                	</div>
                
              </p> 
        </div>	 
        <div class="panel-body">
            	
					<form name="form2" class=""  method="post" action="">
						<div class="col-sm-3 form-group " >
							<input type="text" class="input-sm form-control" name="PalavraChave" maxlength="30" size='25' placeholder="Numero do processo ou nome" required="">
				    	</div>
				   		<div class="col-sm-1 col-md-1 ">
							<button class='btn btn-sm btn-success' name='buscar'><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
				    	</div>
					</form>
                 
             
            <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
              		<p class="">
              			 
								<label for="texto">Número de candidatos: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
              		</p> 
            <div class="row-fluid">
            <div class="table-responsive">
					<form name="form1" method="post" action="">
			   			
			                <table id="Tabela" class="table table-bordered table-striped  table-responsive table-hover">
			                  	<thead class="bg-primary">
									
									<th>Nome</th>
									<th>Apelido</th>
									<th>E-mail</th>
									<th>Contato</th>
									<!-- <th>Data Nascimento</th> -->
									<th>CPF</th>
									<th>Sexo</th> 
									<th>Classe</th> 
									<th>Ações</th>
								</thead>
								<tbody class="searchable">
							<?php 
								while($linhas = mysql_fetch_array($resultado)){
									echo "<tr>";
			                        
									echo "<td>".$linhas['nome']."</td>";
			                        echo "<td>".$linhas['apelido']."</td>";
									echo "<td>".$linhas['email']."</td>";
			                        echo "<td>".$linhas['contacto']."</td>";
									// echo "<td>".$linhas['dataNascimento']."</td>";
			                        echo "<td>".$linhas['numeroBI']."</td>";
			                        ?>
			                        <td class="hidden"><input type="text" class="input-sm form-control" name="BI" value="<?php echo $linhas['numeroBI']?>" placeholder="Número de BI" required=""></td>
			                        <?php
									echo "<td>".$linhas['sexo']."</td>";
									echo "<td>".$linhas['classe'].'ª'."</td>";
							?>
									<td> 
									
									<a href='ver_Candidato.php?BI=<?php echo $linhas['numeroBI']; ?>'><button  type='button' class='btn btn-sm btn-primary btn'><span class="glyphicon glyphicon-eye-open"></span></button></a>
									<a href='candidato-editar.php?idCandidato=<?php echo $linhas['numeroBI']; ?>'><button type='button' class='btn btn-sm btn-warning btn'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
									<button type='button' name='Confirmar' class='btn btn-sm btn-success' data-title="Confirmar" data-toggle="modal" data-target="#Confirmar" data-whatever="<?php echo $linhas['numeroBI'];?>"><span class="glyphicon glyphicon-ok-sign"></span> Confirmar</button>

									
									<?php
											echo "</tr>";
										}
									?>
								</tbody>
		  					</table>
	  					</div>
		  			</form>
		  			
			  
		</div>
		<p class="clearfix"></p>
		<button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>	
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
				<div class="modal fade" id="Confirmar" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					<h4 class="modal-title custom_align" id="Heading">Confirme a inscrição</h4>
				</div>
				<form name="Conf_Inscricao" method="POST" action="Conf_Inscricao.php">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="numeroBI" id="id"  class="form-control">
							<script type="text/javascript">
								
									var BI =$("#id").value();
									
							</script>
							<?php
            

							  $query=mysql_query("SELECT * FROM tabela_turma");
							  
		                  	?>
							<div class="clearfix"> 	
								Recibo:
								<input type="text" name="numeroRecibo" required="" maxlength="15" class="form-control" id="Recibo" placeholder="Digite o número do Recibo">
							</div>
							<p class="clearfix"></p>
							
							<div class="">
								Turma:
								  <select class="input sm form-control" name="turmaCandidato" required="">
								  <option></option>
								  	<?php 
				                      
				                      while($linhas=mysql_fetch_array($query)){ 
				                          
				                         echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma']."</option>";
				                      }
				                      
				                      ?>
									</select>
							</div>
						</div>
					</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
					<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Ok</button>
				 </div></div> </div></div> </form>
				<!-- Fim Modal -->

				<script type="text/javascript">
		$('#Confirmar').on('show.bs.modal', function (event) {
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