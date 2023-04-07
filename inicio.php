<?php
include_once("principal.php");

    
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}


	$resultado = mysql_query("SELECT * FROM tabela_estudante");
	$numEstudantes = mysql_num_rows($resultado);
	$resultado1 = mysql_query("SELECT * FROM Professor ORDER BY 'ID'");
	$numProfessores = mysql_num_rows($resultado1);
	$resultado2 = mysql_query("SELECT * FROM funcionario ORDER BY 'ID'");
	$numFuncionarios = mysql_num_rows($resultado2);
?>

<div class="container-fluid" >
    <div class="row-fluid">
	<div class="col col-lg-H col-md-H col-sm-H haggy">
            
			<div class=" col-md-12">
               	<div class="alert alert-info">
    				<h1 align="center">Seja Bem-Vindo(a)!</h1>
					
    				
					 <center>
    				 <strong><?php echo "".$_SESSION['usuarioNome'];?></strong> <br>
    				 
    				 </center>
					 
 				</div>
            </div>
            <?php if($_SESSION['usuarioNivelAcesso']=='1' OR $_SESSION['usuarioNivelAcesso']=='5') {?>
            <div class="col-md-4">
               	<div class="alert alert-warning">
    				<h2 align="center">Estudantes</h2>
					
    				
					 <center>
    				 <strong><?php echo "".$numEstudantes;?></strong> <br>
    				 
    				 </center>
					 
 				</div>
            </div>
            <div class="col-md-4">
               	<div class="alert alert-info">
    				<h2 align="center">Professores</h2>
					
    				
					 <center>
    				 <strong><?php echo "".$numProfessores;?></strong> <br>
    				 
    				 </center>
					 
 				</div>
            </div>
            <div class="col-md-4">
               	<div class="alert alert-success">
    				<h2 align="center">Funcionários</h2>
					
    				
					 <center>
    				 <strong><?php echo "".$numFuncionarios;?></strong> <br>
    				 
    				 </center>
					 
 				</div>
            </div>
            <?php } ?>
    </div>
	</div>
</div>


<?php
	include_once("rodape.php");
?>


