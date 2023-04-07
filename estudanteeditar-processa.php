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

<div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Editar Usuário</h3>
                  </div>
                  
	</div>
	</div>

       	<div class="row">
        <div class="col-md-12">
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
				  <input type="text" class="input-sm form-control" name="nome" value="<?php echo $resultado['nome']?>" placeholder="Nome Completo" required="" autofocus="">
				</div>
				<div class="col-sm-4">
				E-mail:
				  <input type="email" class="input-sm form-control" name="email" value="<?php echo $resultado['email']?>" placeholder="E-mail" required="">
				</div>
								<div class="col-sm-4">
				Nivel de Acesso:
				  <select hide class="input sm form-control" name="nivel_de_acesso" required="">
				
				  	<option value="1" <?php if( $resultado['idNivelAcesso'] == 1){ echo 'selected'; } ?> >Administrador Primário</option>
					<option value="2" <?php if( $resultado['idNivelAcesso'] == 2){ echo 'selected'; } ?> >Area Administrativa</option>
					<option value="3" <?php if( $resultado['idNivelAcesso'] == 3){ echo 'selected'; } ?> >Instrutor</option>
				    <option value="4" <?php if( $resultado['idNivelAcesso'] == 4){ echo 'selected'; } ?> >Estudante</option>
					</select>
				</div>
				
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-4">
				Usuário:
				  <input type="text" class="input sm form-control" name="usuario" value="<?php echo $resultado['login']?>" placeholder="Usuário" required="">
				</div>
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
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-12 col col-xs-12 text-right">
              
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Guardar</button>
				  
				  <a href='listarUsuarios.php'><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-remove"></span>   Cancelar</button></a>
				</div
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