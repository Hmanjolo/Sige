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
 session_start();
 
	$ID = $_GET['ID'];
	$_SESSION['ID']= $ID;
	//Executa consulta
	$result = mysql_query("SELECT * FROM funcionario WHERE ID = '$ID' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
	
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p>	
	            <div class="divH"><label>Dados do Funcionario</label></div>
	        </p> 
		</div>
		<div class="panel-body">
        <form class="form-horizontal" name="" method="POST" >
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		
			<div class="col-sm-12">
			  <div class="form-group">
			  
				<div class="col-sm-4">
				<label>Nome:</label>
				  <?php echo $resultado['Nome']?>
				</div>
				<div class="col-sm-4">
				<label>Apelido:</label>
				  <?php echo $resultado['Apelido']?>
				</div>
				<div class="col-sm-4">
				<label>E-mail:</label>
				  <?php echo $resultado['Email']?>
				</div>
			  </div>
			     <hr>
			</div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>Celular:</label>
				  <?php echo $resultado['Contacto']?>
				</div>
				<div class="col-sm-4">
				<label>Data de Nascimento:</label>
				  <?php echo $resultado['DOB']?>
				</div>
				<div class="col-sm-4">
				<label>Número de BI:</label>
				  <?php echo $resultado['BI']?>
				  <input type="hidden" class="input-sm form-control" name="idUsuario" value="<?php echo $resultado['idUsuario']?>" placeholder="ID do Usuario" required="">
				</div>
			  </div>
			  	  <hr>
		   </div>
         
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  
			  <div class="col-sm-4">
				<label>Sexo:</label>
				  <?php echo $resultado['Sexo']?>
				</div>
				<div class="col-sm-4">
				<label>Estado civil:</label>
				  	<?php echo $resultado['Estado']?>
				</div>
				
			  </div>
			  		<hr>
		  </div>
          
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-4">
				<label>País:</label>
				  	<?php echo $resultado['Pais']?>
				</div>
				
			  <div class="col-sm-4">
				<label>Naturalidade:</label>
				  <?php echo $resultado['Naturalidade']?>
				</div>
			  
			  <div class="col-sm-4">
			  	<label>Morada:</label>
				<?php
				  echo $resultado['Bairro']?>
				</div>
				
			  </div>
			  	  <hr>
		   </div>
          
    		  <hr class="">
			
				
			 
			 	<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <a href='funcionario-editar.php?ID=<?php echo $ID; ?>'><button type='button' class='btn btn-warning'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
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