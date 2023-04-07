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
<?php
if (isset($_POST['relacao'])) {
    $Turma = $_POST['Turma'];
    $Professor = $_POST['Professor'];
    
    $sql = "INSERT INTO `detalhes_turma`(`idTurma`, `id_Professor`, `ano`) VALUES ('$Turma','$Professor', NOW())";
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
				header("Location: detalhes_Turma.php");
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
				header("Location: detalhes_Turma.php");
    }

}

?>

	 <div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Relação Professor-Turmas</h3>
                  </div>
				  
				  <div class="col col-xs-6 text-right">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-floppy-disk"></span> Adiconar relações</button></a>

                  </div>
				  
                </div>
				
              </div>
			<div class="panel-body">
			 
			 <div class="row">
               <div class="col col-xs-12 col-sm-12 ">
				<form name="form2" method="post" action="">
				  <div class="col-sm-12">
				  	<div id="collapseThree" class="panel-collapse collapse">
			  
			  <div class="col-sm-5">
				Turma:
				  <?php
                  
                  $query=mysql_query("SELECT * FROM tabela_turma ORDER BY nomeTurma");
                  ?>
				  <select class="input sm form-control" name="Turma" required="">
				  <option value="">Selecione aqui</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma']."</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-5">
				Professor:
				  <?php
                  
                  $query=mysql_query("SELECT * FROM professor ORDER BY Nome");
                  ?>
				  <select class="input sm form-control" name="Professor" required="">
				  <option value="">Selecione aqui</option>
				  	<?php 
                      
                      while($linhas=mysql_fetch_array($query)){ 
                          
                         echo "<option value = '".$linhas['BI']."'>".$linhas['Nome'].' '.$linhas['Apelido']. "</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-2">
					<br>
					<button name="relacao" class='btn btn-sm btn-success btn-block'><span class="glyphicon glyphicon-save"></span> Salvar</button>
				</div>
				
			  </div>
			</div>
				   
					
				</form>

                  </div>
                </div> 
            
             <div class="table-responsive">
             	<div class="panel panel-info filterable">
              <div class="panel-heading ">
                <div class="row">
                  <div class="col col-xs-6">
                   <?php 
			
				//$resultado = mysql_query( "SELECT * FROM `detalhes_turma` 
				// INNER JOIN tabela_turma on detalhes_turma.idTurma=tabela_turma.idTurma  ");

				$resultado = mysql_query( "SELECT * FROM `detalhes_turma` 
				INNER JOIN tabela_turma on detalhes_Turma.idTurma=tabela_turma.idTurma INNER JOIN professor on detalhes_Turma.id_Professor=professor.BI ORDER by ano desc");?>
				
                  </div>
				  
                </div>
              </div>
			  
			<form name="form1" method="post" action="">
			   
                <table class="table table-bordered table-striped  table-responsive table-hover">
                  <thead>
              
					
					<th>Turma</th>
					<th>Professor</th>
	
						<th>Ano</th>
					 <th >Acções</th>
				  </tr>
				</thead>
				<tbody class="searchable">
				
			<?php 
			
				
				while($linhas = @mysql_fetch_array($resultado)){
					echo "<tr>";
						
                        
						echo "<td>".$linhas['idTurma']."</td>";
                        echo "<td>".$linhas['Nome'].' '.$linhas['Apelido']."</td>";
						echo "<td>".$linhas['ano']."</td>";
						
                        
						?>
						<input type="hidden" class="form-control" name="idUsuario" value="<?php echo $linhas['id_Relacao'];?>">
						
						<td> 
						<a href='.php?ID=<?php echo $linhas['id_Relacao']; ?>'><button type='button' class='btn btn-sm btn-warning btn-block'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
						
						<!--<button type='button' class='btn btn-sm btn-danger' data-title="Delete" data-toggle="modal" data-target="#delete" data-whatever="<?php echo $linhas['id_Relacao'];?>"><span class="glyphicon glyphicon-trash"></span> Apagar</button>
						-->
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

<?php
	include_once("rodape.php");
?>