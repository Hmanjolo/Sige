 <?php
	include_once("principal.php");
	
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
	              	
	            <div class="divH"><label>Alterar Dados Pessoais</label></div>
	                	
	                
	        </p> 
		</div>

       	<div class="panel-body">
        
          <form class="form-horizontal"  method="POST" action="senha-processa.php">
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		<input type="hidden" class="form-control" name="idUsuario" value="<?php echo $resultado['idUsuario'];?>">
			
			  <div class="col-sm-12">
			  <div class="form-group">
				
				<div class="col-sm-6">
				Senha:
				  <input type="password" class="input sm form-control" name="senha" placeholder="Senha Nova" required="">
				</div>
				<div class="col-sm-6">
				Confirmar senha:
				  <input type="password" class="input sm form-control" name="confirmacao" placeholder="Confirma Senha Nova" required="">
				</div>
			  </div>
			 </div>
			  
			 <p class="clearfix">
			 </p>	
			  
			  <div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Ok</button>
				</div>
			  </div>
			  
			</div>

			</form>
        </div>
		</div>
    </div><!-- /container -->
<?php
	include_once("rodape.php");
?>