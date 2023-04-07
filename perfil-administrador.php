 <?php
session_start();
include_once("conexao.php");
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
	$idUsuario = $_SESSION['usuarioLogin'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tabela_usuarios WHERE idUsuario = '$idUsuario' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

?>

<div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Alterar Dados Pessoais</h3>
                  </div>
                  
	</div>
	</div>

       	<div class="row">
        <div class="col-md-12">
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
				  <input type="text" text-transform = uppercase; class="input-sm form-control" name="nome" value="<?php  echo $resultado['nome'] ?>" placeholder="Nome Completo" disabled required="" autofocus="">
				</div>
				<div class="col-sm-6">
				E-mail:
				  <input type="email" class="input-sm form-control" name="email" value="<?php echo $resultado['email']?>" placeholder="E-mail" disabled required="">
				</div>
								
				
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6">
				Usuário:
				  <input type="text" class="input sm form-control" name="usuario" value="<?php echo $resultado['login']?>" placeholder="Usuário" disabled required="">
				</div>
				
				<div class="col-sm-6">
				Contato:
				  <input type="text" class="input sm form-control" name="contato" value="<?php echo $resultado['contacto']?>" placeholder="Contacto"  required="">
				</div>
				
				
			  </div>
			 </div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-12 col col-xs-12 text-right">
				  
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Guardar</button>
				  
				  <a href='perfil.php'><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-remove"></span>   Cancelar</button></a>
				</div>
			  </div>
			  </di>
			</form>
        </div>
		</div>
    </div><!-- /container -->
    
    
<?php
	include_once("rodape.php");
?>