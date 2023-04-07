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
                    <h3 class="panel-title">Notas de Frequencia</h3>
                  </div>
                 
                </div>
              </div>
            <form name="form1" method="post" action="">
			    <div class="panel-body">
                <table class="table table-condensed table-striped table-bordered table-list table-hover">
                  <thead>
                    <tr class="filters">
            <th>Disciplina</th>
            <th>Teste 1</th>	
			<th>Teste 2</th>
			<th>Teste 3</th>
			<th>Teste 4</th>
			<th>Trabalho</th>
			<th>Média</th>
            <th>Classificação</th>
				  </tr>
				</thead>
				<tbody class="searchable">

			<?php 
			
                     
	
	        
    
                 //$resultado=mysql_query("SELECT * FROM tabela_notas WHERE idEstudante ");
                     
                    
	//$linhas=mysql_num_rows($resultado);
    
   //$idUsuario = $_SESSION['idUsuario'];
    //$idTurma = $_SESSION['idTurma'];
     $idUsuario = $_SESSION['usuarioId'];
   
                         $resultado = mysql_query( "SELECT * FROM `tabela_notas` INNER JOIN tabela_estudante on tabela_notas.idEstudante=tabela_estudante.idEstudante   where idUsuario = '$idUsuario'   ");
              
  
	//$resultado = mysql_query( "SELECT * FROM `tabela_notas` 
				//INNER JOIN tabela_estudante on tabela_notas.idEstudante=tabela_estudante.idEstudante  INNER JOIN tabela_usuarios on tabela_estudante.idUsuario=tabela_usuarios.idUsuario  where idUsuario=$idUsuario  ");

	//$resultado = @mysql_query("SELECT * FROM tabela_notas  	INNER JOIN tabela_usuarios on tabela_notas.idEstudante=tabela_estudante.idEstudante    	INNER JOIN tabela_estudante on tabela_estudante.idUsuario=tabela_usuarios.idUsuario           where idUsuario=$idUsuario    order by idNota");
	$linhas = @mysql_num_rows($resultado);   

				while($linhas = @mysql_fetch_array($resultado)){
					echo "<tr>";
                        echo "<td>".$linhas['']."</td>";
				        echo "<td>".$linhas['Teste1']."</td>";
						echo "<td>".$linhas['Teste2']."</td>";
						echo "<td>".$linhas['Teste3']."</td>";
                        echo "<td>".$linhas['Teste4']."</td>";
                        echo "<td>".$linhas['Trabalho']."</td>";
                        echo "<td>".$linhas['Media']."</td>"; 
                        echo "<td>".$linhas['classificacao']."</td>";
					
					echo "</tr>";
                }
			?>
		</tbody>
	  </table>
	  </form>
	</div>
             </div>
	</div>
</div> <!-- /container -->

	</script>

<?php
	include_once("rodape.php");
    
?>