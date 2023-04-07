<?php

	include_once("principal.php");
    include_once("menu2.php");
	
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
?>



	 <div class="col-md-9 col-md-offset-0">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Selecione a tua  Turma </h3>
                  </div>
                 
                </div>
              </div>
              
            <form class="form-group" name="form1" method="post" action=" notas.php">
            	<div  class="form-row align-items-center">
            	<div class="col-xs-3">
			    <div class="panel-body">
			    	<select class="selectpicker form-control"   name="nomeTurma">
			    		<option class="" disabled="">Selecione</option>
			    		<?php
                 


			    		$idUsuario = $_SESSION['usuarioId'];
                         $resultado = mysql_query( "SELECT * FROM `tabela_estudante` INNER JOIN tabela_turma on tabela_estudante.idTurma=tabela_turma.idTurma  where idUsuario = '$idUsuario' ");
              
			    		while ( $row_query= mysql_fetch_assoc($resultado)) {?>
			    		<option value="<?php echo $row_query[' idUsuario']; ?>"> <?php echo $row_query['nomeTurma']; ?></option><?php
			    		
			    		}
			    		?>
			    	</select>  
                     <div class="input-group-btn">
			    	<button type="submit" class="btn btn-defaul" ><i class="glyphicon glyphicon-search">Buscar</i></button>
			    </div>
			    </div>
			    </div>
               </div> 
	  </form>
	</div>
	
             </div>
	</div>
</div> <!-- /container -->

	</script>

<?php
	include_once("rodape.php");
    
?>