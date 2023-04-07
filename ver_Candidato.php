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
	
	$BI = $_GET['BI'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM inscricao WHERE numeroBI = '$BI' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
	
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p>	
	            <div class="divH"><label>Dados do Candidato</label></div>
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
				<label>Nome:</label>
				  <?php echo $resultado['nome']?>
				</div>
				<div class="col-sm-4">
				<label>Apelido:</label>
				  <?php echo $resultado['apelido']?>
				</div>
				<div class="col-sm-4">
				<label>Número de BI:</label>
				  <?php echo $resultado['numeroBI']?>
				  <input type="hidden" class="input-sm form-control" name="idUsuario" value="<?php echo $resultado['idUsuario']?>" placeholder="ID do Usuario" required="">
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
				<label>Contacto:</label>
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
				<label>Sexo:</label>
				  <?php echo $resultado['sexo']?>
				</div>
				<div class="col-sm-4">
				<label>Estado civil:</label>
				  	<?php echo $resultado['estadoCivil']?>
				</div>
				<div class="col-sm-4">
				<label>País:</label>
				  	<?php echo $resultado['pais']?>
				</div>
			  </div>
			  		<hr>
		  </div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  
				
			  <div class="col-sm-4">
				<label>Naturalidade:</label>
				  <?php echo $resultado['naturalidade']?>
				</div>
			  
			  <div class="col-sm-4">
			  	<label>Morada:</label>
				<?php
				  echo $resultado['localResidencia']?>
				</div>
			  <div class="col-sm-4">
			  	<label>Classe:</label>
				<?php
				  echo $resultado['classe']?>
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
			  <div class="col-sm-12">
							  				
								<div class='divH'>
														<div class='alert alert-info text-center' role='alert'>
														
															<label>Dados da escola de anterior</label>
														</div>
							  </div>
							  
			</div>
			<div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>Nome da Escola:</label>
				  	<?php echo $resultado['Escola_Saida']?>
				</div>
				
			  <div class="col-sm-2">
				<label>Ano:</label>
				  <?php echo $resultado['Ano_Saida']?>
				</div>
			  
			  <div class="col-sm-4">
			  	<label>Classe:</label>
				<?php
				  echo $resultado['Classe_frequentada']?>
				</div>
			  <div class="col-sm-2">
			  	<label>Turma:</label>
				<?php
				  echo $resultado['Turma_frequentada']?>
				</div>
				
			  </div>
          	  </div>
			 
			 	<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <a href='candidato-editar.php?idCandidato=<?php echo $BI; ?>'><button type='button' class='btn btn-warning'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
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