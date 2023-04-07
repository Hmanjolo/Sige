<?php
//include_once("seguranca.php");
include_once("principal.php");
include_once("conexao.php");

$idUsuario = $_POST["idUsuario"];
$query = "DELETE FROM tabela_usuarios WHERE idUsuario=$idUsuario";
$resultado = mysql_query($query);
$linhas = mysql_affected_rows();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	<body>
		<?php
		if (mysql_affected_rows() > 0 ){	

			$_SESSION['mensagem'] = "	 
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Usuário removido com sucesso!
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: listarUsuarios.php");?>
<?php }else{ ?>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Remoção</h4>
						</div><div class="modal-body">
						<div class="alert alert-danger"><strong>Erro ao Remover!</strong></div>
						</div>
						<div class="modal-footer">
						<a href='listarUsuarios.php'><button type="button" class="btn btn-info">OK</button></a>
						</div></div></div></div>				
			<script>
				$(document).ready(function () {
					$('#myModal').modal('show');
				});	
			</script>	

		<?php
		}

		?>
		
		<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="offcanvas.js"></script>

</body>
</html>

