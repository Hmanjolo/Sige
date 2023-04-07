<?php
include_once("menu2.php");	
include_once("principal.php");
    
?>
<body>
<div class="col-sm-9 col-md-9">
            <div class="well">
               	<div class="alert alert-info">
    				<h1 align="center">Bem Vindo ao Sistema</h1>
    				 <center>
    				 <strong>nnnnNome:</strong> <?php echo "".$_SESSION['usuarioNome'];?> <br>
    				 <strong>E-mail:</strong> <?php echo "".$_SESSION['usuarioEmail'];?><br>
    				 </center>
 				</div>
            </div>
        </div>

</body>

<?php
	include_once("rodape.php");
?>


