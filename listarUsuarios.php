<?php
	include_once("principal.php");
	
?>

<?php

if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
}
 
if (isset($_POST['buscar'])) {
    $pesquisar = $_POST['PalavraChave'];
    $resultado = mysql_query("SELECT *, tabela_nivel_acesso.nomeNivelAcesso as nomenivel FROM tabela_usuarios INNER JOIN tabela_nivel_acesso ON tabela_nivel_acesso.idNivelAcesso= tabela_usuarios.idNivelAcesso WHERE idUsuario LIKE '$pesquisar%' or Nome LIKE '$pesquisar%'");
    unset($_POST['buscar']);
}else{
	$resultado = mysql_query("SELECT *, tabela_nivel_acesso.nomeNivelAcesso as nomenivel FROM tabela_usuarios INNER JOIN tabela_nivel_acesso ON tabela_nivel_acesso.idNivelAcesso= tabela_usuarios.idNivelAcesso ORDER BY 'idUsuario'");

}


?>     

<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Usuários</label></div>
                	
                
              </p> 
        </div>	 
        <div class="panel-body">
					<form name="form2" class="hidden" method="post" action="">
						<div class="col-sm-3  form-group" >
							<input type="text" class="input-sm form-control" name="PalavraChave" maxlength="30" size='25' placeholder="Usuario ou nome" required="">
				    	</div>
				   		<div class="col-sm-1 col-md-1">
							<button class='btn btn-sm btn-success' name='buscar'><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
				    	</div>
					</form>
                

              <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
              		<p class="hidden">
              			
								<label for="texto">Número de Usuários: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
              		</p> 
            <div class="row-fluid">
            <div class="table-responsive">
			<form name="form1" method="post" action="">
			    
                <table id="Tabela" class="table table-condensed table-striped table-bordered table-list table-hover">
                  <thead class="bg-primary">
                    <tr class="filters">
					<th>Usuário</th>
					<th>Nome</th>
					
					<th>Nível de Acesso</th>
					<th>Estado</th>
					<th>Ações</th>
				  </tr>
				</thead>
				<tbody class="searchable">
			<?php 
			 
				while($linhas = mysql_fetch_array($resultado)){
                 
                
                //if ($linhas['nomenivel'] =="Area Administrativa" || $linhas['nomenivel'] =="Professor" || $linhas['nomenivel'] =="Estudante"){ 
					echo "<tr>";
						echo "<td>".$linhas['idUsuario']."</td>";
                        echo "<td>".$linhas['nome']."</td>";
						
						echo utf8_encode ("<td>".$linhas['nomenivel']."</td>");
						if($linhas['estado']=='Activo'){?>
						<td><a href='EstadoMudar.php?idUsuario=<?php echo $linhas['idUsuario']; ?>&Estado=<?php echo $linhas['estado']; ?>'><button type='button' name='Desativar' class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-remove-sign'></span> Desativar</button></a></td>
						<?php	
						}else{?>
						<td><a href='EstadoMudar.php?idUsuario=<?php echo $linhas['idUsuario']; ?>&Estado=<?php echo $linhas['estado']; ?>'><button type='button' name='Activar' class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-ok-sign'></span> Activar</button></td>
						<?php
						}
						?>
						<td> 
						<a href='Usuario-editar.php?idUsuario=<?php echo $linhas['idUsuario']; ?>'><button type='button' class='btn btn-sm btn-warning btn-block'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>

					<?php //	} ?>
						<?php
						echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	  </div>
	  </form>
	<button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
	<p class="clearfix"></p>
	<p class="clearfix"></p>
</div>
</div>
</div>
</div>
</div><!-- /container -->
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
				<form name="form" method="POST" action="Usuario-processa-apagar.php">
				<div class="modal-body">
				
				
				<input type="hidden" name="idUsuario" class="form-control" id="id">
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Tens a certeza que desejas Eliminar o usuario?</div>
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

<?php
	if(isset($_POST['Estado'])){
		echo '';
	}
?>
    