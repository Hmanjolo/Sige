 <?php
	include_once("principal.php");
include_once("portal-menu.php");
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
                    <h3 class="panel-title">Cadastrar Usuário</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
			<a href='listarUsuarios.php'><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-list-alt"></span> Listar Usuário</button></a>
		</div>
	</div>
	</div>

       	<div class="row">
        <div class="col-md-12">
          <form class="form-horizontal"  method="POST" action="Usuario-processa-cadastro.php">
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		
			<div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-4">
				Nome completo:
				  <input type="text" class="input-sm form-control" name="nome" placeholder="Nome Completo" required="" autofocus="">
				</div>
				<div class="col-sm-4">
				Usuário:
				  <input type="text" class="input sm form-control" name="usuario" placeholder="Usuário" required="">
				</div>
				
				<div class="col-sm-4">
				Nivel de Acesso:
				  <select class="input sm form-control" name="nivel_de_acesso" required="">
				  	<option value="">Selecione aqui</option>
					  <option value="1">Administrador Primário</option>
					  <option value="2">Administrador Secundário</option>
					  <option value="3">Instrutor</option>
					  <option value="4">Estudante</option>
					</select>
				</div>
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				
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
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Cadastrar</button>
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