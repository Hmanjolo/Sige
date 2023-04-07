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
if (isset($_POST['relacao'])) {
    $Disciplina = $_POST['Disciplina'];
    $Professor = $_POST['Professor'];
    $Turma = $_POST['Turma'];

    $sql = "INSERT INTO `detalhes_disciplina`(`id_Disciplina`, `id_Professor`,`idTurma`, `ano`) VALUES ('$Disciplina','$Professor','$Turma', NOW())";
    $confirmacao = mysql_query($sql);
    
    if($confirmacao){
    	$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Operação efectuada com sucesso!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: detalhes_disciplina.php");
    }
    else{
    	$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Erro ao efectuar a operação!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: detalhes_disciplina.php");
    }

}

?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Disciplina-Professor</label></div>
                	<div class="text-right divH">
                		<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><button type='button' class='text-right btn btn-sm btn-info'><span class="glyphicon glyphicon-plus"></span> </button></a>
                	</div>
                
              </p> 
        </div>
			<div class="panel-body">
			 
			 <div class="row">
               <div class="col col-xs-12 col-sm-12 ">
				<form name="form2" method="post" action="">
				  
				<div id="collapseThree" class="panel-collapse collapse">
			  
			  <div class="col col-sm-3">
				
				  <?php
                  
                  $query=mysql_query("SELECT * FROM disciplina ORDER BY Nome");
                  ?>
				  <select class="input sm form-control" name="Disciplina" required="">
				  <option value="">Disciplina</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['Nome']."'>".$linhas['Nome']."</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-3">
				
				  <?php
                  
                  $query=mysql_query("SELECT * FROM professor ORDER BY Nome");
                  ?>
				  <select class="input sm form-control" name="Professor" required="">
				  <option value="">Professor</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['BI']."'>".$linhas['Nome'].' '.$linhas['Apelido']. "</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-3">
				
				  <?php
                  
                  $query=mysql_query("SELECT * FROM tabela_turma ORDER BY nomeTurma");
                  ?>
				  <select class="input sm form-control" name="Turma" required="">
				  <option value="">Turma</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma']."</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-3 text-rigth ">
					<button name="relacao" class='btn btn-sm btn-success btn-block'><span class="glyphicon glyphicon-save"></span> Salvar</button>
				</div>
				
			  </div>
			  <p class="clearfix"></p>
			
				   
					
				</form>

                  </div>
                </div> 
            
             <div class="table-responsive">
             	
           
                
                   <?php 
			
				//$resultado = mysql_query( "SELECT * FROM `detalhes_disciplina` 
				// INNER JOIN tabela_turma on detalhes_disciplina.idTurma=tabela_turma.idTurma  ");

				$resultado = mysql_query( "SELECT * FROM `detalhes_disciplina` 
				INNER JOIN disciplina on detalhes_disciplina.id_Disciplina=disciplina.Nome  INNER JOIN professor on detalhes_disciplina.id_Professor=professor.BI JOIN tabela_turma on tabela_turma.idTurma=detalhes_disciplina.idTurma ORDER by ano desc");?>
			
			  
			<form name="form1" method="post" action="">
			   
                <table id="Tabela" class="table table-bordered table-striped  table-responsive table-hover">
                  <thead class="btn-primary">
              
					
					<th>Disciplina</th>
					<th>Professor</th>
					<th>Turma</th>
					<th>Ano</th>
					<!--<th >Acções</th>-->
				  </tr>
				</thead>
				<tbody class="searchable">
				
			<?php 
			
				
				while($linhas = @mysql_fetch_array($resultado)){
					echo "<tr>";
						
                        
						echo "<td>".$linhas['id_Disciplina']."</td>";
                        echo "<td>".$linhas['Nome'].' '.$linhas['Apelido']."</td>";
                        echo "<td>".$linhas['nomeTurma']."</td>";
						echo "<td>".$linhas['ano']."</td>";
						
                        
						?>
						<input type="hidden" class="form-control" name="id_Relacao" value="<?php echo $linhas['id_Relacao'];?>">
						
						<!--<td> 
						<a href='EditarRelacao.php?ID=<?php echo $linhas['id_Relacao']; ?>'><button type='button' class='btn btn-sm btn-warning btn-block'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
						
						
						<button type='button' class='btn btn-sm btn-danger' data-title="Delete" data-toggle="modal" data-target="#delete" data-whatever="<?php echo $linhas['id_Relacao'];?>"><span class="glyphicon glyphicon-trash"></span> Apagar</button>-->
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	  </form>
	</div>
		<button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>	
</div>
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
				<form name="form" method="POST" action="Instrutor-processa-apagar.php">
				<div class="modal-body">
				
				
				<input type="hidden" name="idUsuario" class="form-control" id="idUsuario">
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
		  //modal.find('.modal-title').text('Editar Usuario - idUsuario: ' + recipient)
		  modal.find('#idUsuario').val(recipient)
		
		  })
	</script>
<!--Modal editar relacao-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Editar Dados</h4>
		</div>
		<form name="form3" method="POST" action="">
		<div class="modal-body">
				
				
		<input type="text" name="id_Relacao" class="form-control" id="id_Relacao">		
		<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span><?php echo $linhas['id_Relacao'];?> </div>
		</div>
		<div class="modal-footer ">
				
				
				<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Ok</button>
				
		</div>
		</form>
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
				<!-- Fim Modal -->


				<script type="text/javascript">
		$('#edit').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') 
		  var modal = $(this)
		  //modal.find('.modal-title').text('Editar Usuario - idUsuario: ' + recipient)
		  modal.find('#id_Relacao').val(recipient)
		
		  })
	</script>
<!--Fil do modal-->

<?php
	include_once("rodape.php");
?>