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
	$idUsuario = $_SESSION['usuarioLogin'];
	$Nivelacesso=$_SESSION['usuarioNivelAcesso'];
	//Executa consulta
	$result = @mysql_query("SELECT * FROM tabela_usuarios WHERE idUsuario = '$idUsuario' LIMIT 1");
	$resultado = @mysql_fetch_assoc($result);
	if ($Nivelacesso==4) {		
		$result1 = mysql_query("SELECT * FROM tabela_estudante WHERE idUsuario = '$idUsuario' LIMIT 1");
	}
	
	else if($Nivelacesso==3) {
		$result1 = @mysql_query("SELECT * FROM professor WHERE idUsuario = '$idUsuario' LIMIT 1");
	}
	else if($Nivelacesso==2 or $Nivelacesso==5) {
		$result1 = @mysql_query("SELECT * FROM funcionario WHERE idUsuario = '$idUsuario' LIMIT 1");
	}
	
	$resultado1 = @mysql_fetch_assoc($result1);
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
        
          <form class="form-horizontal"  method="POST" action="perfil-processa.php">
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		<input type="hidden" class="form-control" name="idUsuario" value="<?php echo $resultado['idUsuario'];?>">
			<div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6">
				Nome completo:
				  <input type="text" text-transform = uppercase; class="input-sm form-control" maxlength="40" name="nome" value="<?php  echo $resultado['nome'] ?>" placeholder="Nome Completo" disabled required="" autofocus="">
				</div>
				<div class="col-sm-6">
				E-mail:
				  <input type="email" class="input-sm form-control" name="email" maxlength="40" value="<?php  echo $resultado1['email'].$resultado1['Email'] ?>"  placeholder="E-mail"  required="">
				</div>
								
				
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6">
				Usuário:
				  <input type="text" class="input sm form-control" name="usuario" maxlength="25" value="<?php  echo $resultado['idUsuario'] ?>"  placeholder="Usuário"  required="">
				</div>
				
				<div class="col-sm-6">
				Contato:
				  <input type="text" class="input sm form-control" name="contato" maxlength="9" value="<?php echo $resultado1['contacto'].$resultado1['Contacto']?>" placeholder="Contato"  required="">
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