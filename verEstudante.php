 <?php
require_once("principal.php");

?>
<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
				}
?>
			
<?php
	//Executa consulta
	
	$idEstudante = $_GET['idEstudante'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tabela_estudante WHERE idEstudante = '$idEstudante' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p>	
	            <div class="divH"><label>Dados do Aluno</label></div>
	            <div class="text-right divH">
                		<a href="File.php?BI=<?php echo $resultado['numeroBI']; ?>"><button type='button' class='text-right btn btn-sm btn-info'><span class="glyphicon glyphicon-print"></span> Imprimir</button></a>
                	</div>
	        </p> 
		</div>
		<div class="panel-body">
        <form class="form-horizontal" name="cadastrarEstudante" method="POST" >
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		
			<div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				<label>Número do Processo:</label> 
				  <?php echo $resultado['idEstudante']?>

			  </div>

				<div class="col-sm-4">
				<label>Nome:</label>
				  <?php echo $resultado['nome']?>
				</div>
				<div class="col-sm-4">
				<label>Apelido:</label>
				  <?php echo $resultado['apelido']?>
				</div>
				
			  </div>
			     <hr>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  <div class="col-sm-4">
				<label>E-mail:</label>
				  <?php echo $resultado['email']?>
				</div>
			  <div class="col-sm-4">
				<label>Contato:</label>
				  <?php echo $resultado['contacto']?>
				</div>
				<div class="col-sm-4">
				<label>Data de Nascimento:</label>
				  <?php echo $resultado['dataNascimento']?>
				</div>
				
			  </div>
			  	  <hr>
		   </div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>Número de BI:</label>
				  <?php echo $resultado['numeroBI']?>
				  <input type="hidden" class="input-sm form-control" name="idUsuario" value="<?php echo $resultado['idUsuario']?>" placeholder="ID do Usuario" required="">
				</div>
			  <div class="col-sm-4">
				<label>Sexo:</label>
				  <?php echo $resultado['sexo']?>
				</div>
				<div class="col-sm-4">
				<label>Estado civil:</label>
				  	<?php echo $resultado['estadoCivil']?>
				</div>
				
			  </div>
			  		<hr>
		  </div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>País:</label>
				  	<?php echo $resultado['pais']?>
				</div>
				
			  <div class="col-sm-4">
				<label>Naturalidade:</label>
				  <?php echo $resultado['naturalidade']?>
				</div>
			  
			  <div class="col-sm-4">
			  	<label>Morada:</label>
				<?php
				  echo $resultado['localResidencia']?>
				</div>
				
			  </div>
			  	  <hr>
		   </div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <?php
                  
                  $query=mysql_query("SELECT * FROM tabela_turma ORDER BY idTurma");
				  $idTurma=$resultado['idTurma'];
				  $query1=mysql_query("SELECT * FROM tabela_turma where idTurma='$idTurma'");
				  
				  $query1=mysql_fetch_assoc($query1);
                  ?>
			  
			  <div class="col-sm-4">
				<label>Turma:</label>
				  <?php echo $query1['nomeTurma']?>
					
					</div>
					
				</div>
				  
			</div>
			<div class="col-sm-12">
							  				
								<div class='divH'>
														<div class='alert alert-info text-center' role='alert'>
														
															<label>Encarregados de Educaçao</label>
														</div>
							  </div>
							  
			</div>
			<div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>Pai:</label>
				  	<?php echo $resultado['pai']?>
				</div>
				
			  <div class="col-sm-4">
				<label>Mae:</label>
				  <?php echo $resultado['mae']?>
				</div>
			  
			  <div class="col-sm-4">
			  	<label>Celular:</label>
				<?php
				  echo $resultado['contactoEncarregado']?>
				</div>
				
			  </div>
				
			 </div>
			 	<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <a href='estudanteeditar.php?idEstudante=<?php echo $idEstudante; ?>'><button type='button' class='btn btn-warning'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
				</div>	
				
			  
			  
			  </div>
			  
			</div>

			  </div>
			</form>
        </div>
		</div> 
<?php
	include_once("rodape.php");
?>