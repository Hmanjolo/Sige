 <?php
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
	$idCategoria = $_GET['idCategoria'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tabela_categoria WHERE idCategoria = '$idCategoria' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Editar Categoria</h3>
                  </div>
                  
	</div>
	</div>

       	<div class="row">
        <div class="col-md-12">
          <form class="form-horizontal"  method="POST" action="categoria-processa-editar.php">
          <div class="form-group">
				<div class="col-sm-9">
				</div>
			  </div>
		  		<input type="hidden" class="form-control" name="idCategoria" value="<?php echo $resultado['idCategoria'];?>">
			<div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6">
				Nome:
				  <input type="text" class="input-sm form-control" name="nome" value="<?php echo $resultado['nome']?>" placeholder="Nome da Carta" required="" autofocus="">
				</div>
				<div class="col-sm-6">
				Tipo da carta:
				  <input type="text" class="input-sm form-control" name="CodigoCarta" value="<?php echo $resultado['CodigoCarta']?>" placeholder="Tipo" required="">
				</div>
				
			  </div>
			</div>
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6">
				Peso Bruto Minimo:
				  <input type="text" class="input-sm form-control" name="minimopesobruto" value="<?php echo $resultado['minimopesobruto']?>" placeholder="Minimo" required="">
				</div>
				<div class="col-sm-6">
				Peso Bruto Maximo:
				  <input type="text" class="input-sm form-control" name="maximopesobruto" value="<?php echo $resultado['maximopesobruto']?>" placeholder="Maximo" required="">
				</div>
				
			  </div>
			</div>
			  
			  <div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-12 col col-xs-12 text-right">
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Salvar</button>
				  
				  <a href='listarcategaria.php'><button type='button' class='btn btn-sm btn-info'><span class="glyphicon glyphicon-floppy-disk"></span>Cancelar</button></a>
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