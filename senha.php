 <?php
include_once("conexao.php");
	include_once("principal.php");
include_once("menu2.php");
	
?>
<?php
				if(isset($_SESSION['mensagem'])){
					echo $_SESSION['mensagem'];
					unset($_SESSION['mensagem']);
				}
			?>
			
			
			
	

<div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Alterar Senha</h3>
                  </div>
                  
	</div>
	</div>

       	<div class="row">
        <div class="col-md-12">
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
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-12 col col-xs-12 text-right">
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Guardar</button>
				  
				  <a href='Usuario-senha.php'><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-remove"></span>   Cancelar</button></a>
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