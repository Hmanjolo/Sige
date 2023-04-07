<?php
include_once("principal.php");
	
?>

<?php
	$_SESSION['Ano']='';
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
	
?>
<?php
 	$idTurma=$_SESSION['idTurma'];
	if (isset($_POST['buscar'])) {
    	$pesquisar = $_POST['PalavraChave'];
    	$resultado = mysql_query("SELECT * FROM tabela_estudante where idTurma='$idTurma' AND nome LIKE '$pesquisar%' ");
    if (mysql_num_rows($resultado)<1) {
    	$resultado = mysql_query("SELECT * from tabela_estudante where idTurma='$idTurma' and apelido LIKE '$pesquisar%' ");
    }
    if (mysql_num_rows($resultado)<1) {
    	$resultado = mysql_query("SELECT * from tabela_estudante where idTurma='$idTurma' and numeroCandidato LIKE '$pesquisar%' ");
    }
	}else{
		$resultado = mysql_query("SELECT * FROM tabela_estudante where idTurma='$idTurma' ORDER BY 'idEstudante'");
	}
	$Turmas=mysql_query("SELECT * FROM `tabela_turma` where idTurma='$idTurma'");
	$Turmas = mysql_fetch_array($Turmas)
?>

<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Mensalidades</label></div>
                	
                
              </p> 
        </div>	 
        <div class="panel-body">
					<form name="form2" class="hidden" method="post" action="">
						<div class="col-sm-3  form-group" >
							<input type="text" class="input-sm form-control" name="PalavraChave" maxlength="30" size='25' placeholder="Nº de processo ou nome" required="">
				    	</div>
				   		<div class="col-sm-1 col-md-1">
							<button class='btn btn-sm btn-success' name='buscar'><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
				    	</div>
					</form>
                

              <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
              		<p class="hidden">
              			
								<label for="texto">Número de Estudantes: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
              		</p> 
            <div class="row-fluid">
            <div class="table-responsive">
			<form name="form1" method="post" action="">
			  
                <table id="Tabela" class="table table-bordered table-striped table-responsive table-hover">
                  <thead class="btn-primary">
              
					
					<th>Nº de processo</th>
					<th>Nome do Estudante</th>
					
					<th>Fev</th>
					<th>Mar</th>
					<th>Abr</th>
					<th>Mai</th>
					<th>Jun</th>
					<th>Jul</th>
					<th>Ago</th>
					<th>Sep</th>
					<th>Out</th>
					<th>Nov</th>
					
				  </tr>
				</thead>
				<tbody class="searchable">
				
			<?php 
			
				
				while($linhas = mysql_fetch_array($resultado)){
					echo "<tr>";
						$idEstudante=$linhas['idUsuario'];
                        echo "<td>".$linhas['numeroCandidato']."</td>";
						echo "<td>".$linhas['nome'].' '.$linhas['apelido']."</td>";
                        
                        $Mensal = mysql_query("SELECT * from mensalidades where idEstudante='$idEstudante'");
						$Est = mysql_fetch_array($Mensal)?>
						<td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Fev; ?>&A=<?php echo $Est['Fev']; ?>'><button type='button' <?php if(empty($Est['Fev'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?> </button></td></a>

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Mar; ?>&A=<?php echo $Est['Mar']; ?>'><button type='button' <?php if(empty($Est['Mar'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Abr; ?>&A=<?php echo $Est['Abr']; ?>'><button type='button' <?php if(empty($Est['Abr'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>   

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Mai; ?>&A=<?php echo $Est['Mai']; ?>'><button type='button' <?php if(empty($Est['Mai'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a> 

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Jun; ?>&A=<?php echo $Est['Jun']; ?>'><button type='button' <?php if(empty($Est['Jun'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>						
                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Jul; ?>&A=<?php echo $Est['Jul']; ?>'><button type='button' <?php if(empty($Est['Jul'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>						

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Ago; ?>&A=<?php echo $Est['Ago']; ?>'><button type='button' <?php if(empty($Est['Ago'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>                        

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Sete; ?>&A=<?php echo $Est['Sete']; ?>'><button type='button' <?php if(empty($Est['Sete'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>						

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Outu; ?>&A=<?php echo $Est['Outu']; ?>'><button type='button' <?php if(empty($Est['Outu'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>                    	

                        <td><a href='mensalidades.php?idEstudante=<?php echo $linhas['idUsuario']; ?>&Mes=<?php echo Nov; ?>&A=<?php echo $Est['Nov']; ?>'><button type='button' <?php if(empty($Est['Nov'])){ echo "class='btn btn-sm btn-danger btn-block'><span class='glyphicon glyphicon-unchecked'></span>" ?> <?php }else echo "class='btn btn-sm btn-success btn-block'><span class='glyphicon glyphicon-check'></span>" ?></button></td></a>
						
						
						<?php
					
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	  </div>
	  </form>
	<button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
	<p class="clearfix"></p>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#Tabela').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado!",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros total)"
        }
    	});
	});
</script>


<?php
	include_once("rodape.php");
?>


