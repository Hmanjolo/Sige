<?php
ob_start();
	require_once("principal.php");

	
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
?>
<?php
    $idUsuario=$_SESSION['usuarioId'];
    $query=mysql_query("SELECT * FROM `tabela_turma`");
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			   
			<p>
	              	
	            <div class="divH"><label>Turma</label></div>    	
	                
	        </p> 
		</div>
		<div class="panel-body">
           		<form name="form1" method="post">
           		<div class="col-sm-4">
				   	<select class="input sm form-control" name="Turma" required="">
				  		<?php 
	                      	while($linhas=mysql_fetch_array($query)){ 
		                        $AnoCadastro=explode("-",$linhas['DataCadastro']);
							  	$AnoCadastro=$AnoCadastro[0];  
		                        echo "<option value = '".$linhas['idTurma']."'>".$linhas['nomeTurma'].' '.$AnoCadastro."</option>";
		                    }
                      	?>
					</select>
				</div>
			  	<div class="col-sm-1 col-md-1">
					<button class='btn btn-sm btn-success' name="ok" type="submit" ><span class="glyphicon glyphicon-search"></span> Buscar</button>
				</div>
				</form>   
			</div>
			<?php 
				if(isset($_POST['ok'])){
					session_start();
					$_SESSION['idTurma']=$_POST['Turma'];
					header("Location: listarestudantes.php");
				}
			?>
		</div>
	</div> <!-- Row -->
</div> <!-- container -->
<?php
	include_once("rodape.php");
?>