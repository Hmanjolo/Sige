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
	$idUsuario = $_GET['idUsuario'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tabela_usuarios WHERE idUsuario = '$idUsuario' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p> 	
	            <div class="divH"><label>Editar dados do usuário</label></div>      
	        </p> 
		</div>
		<div class="panel-body">
          <form class="form-horizontal"  method="POST" action="Usuario-processa-editar.php">
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		<input type="hidden" class="form-control" name="idUsuario" value="<?php echo $resultado['idUsuario'];?>">
			<div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-4">
				Nome completo:
				  <input type="text" Disabled class="input-sm form-control" name="nome" value="<?php echo $resultado['nome']?> " placeholder="Nome Completo" required="" autofocus="">
				</div>
				
				<div class="col-sm-4">
				Nivel de Acesso:
				  <select hide class="input sm form-control" name="nivel_de_acesso" required="">
				
				  	<?php 
                      $query=mysql_query("SELECT * FROM `tabela_nivel_acesso`");
                      while($linhas=mysql_fetch_array($query)){ 
                         $Na=$resultado['idNivelAcesso'];
                         echo "<option if ($Na==$i) { 'selected' } value = '".$linhas['idNivelAcesso']."'>".$linhas['nomeNivelAcesso']."</option>";
                      }
                      
                      ?>
					</select>
				</div>
				<div class="col-sm-4">
				Usuário:
				  <input type="text" disabled class="input sm form-control" name="usuario" value="<?php echo $resultado['idUsuario']?>" placeholder="Usuário" required="">
				</div>
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				
				<div class="col-sm-4">
				Senha:
				  <input type="password" class="input sm form-control" name="senha" placeholder="Senha" required="">
				</div>
				<div class="col-sm-4">
				Confirmar senha:
				  <input type="password" class="input sm form-control" name="confirmacao" placeholder="Confirme a Senha" required="">
				</div>
			  </div>
			 </div>
			  
			  <p class="clearfix">
			 </p>	
			  
			  <div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>   Cancelar</button>
				</div>
				<div class="col-sm-6 col col-xs-6 text-right"> 
				  <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
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