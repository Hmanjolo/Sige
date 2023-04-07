 <?php
	include_once("principal.php");

?>
<?php
				if(isset($_SESSION['mensagem'])){
					echo $_SESSION['mensagem'];
					unset($_SESSION['mensagem']);
				}
			?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
	
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
			<p> 	
	            <div class="divH"><label>Alterar Dados Pessoais</label></div>
	        </p> 
		</div>

       	<div class="panel-body">
          <form class="form-horizontal" name="mensagem" method="POST" >
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-8">
				Assunto:
				  <input type="text" class="input-sm form-control" name="assunto" maxlength="50" placeholder="Digite o assunto aqui" required="">
				</div>				
			  </div>
			</div>
          <div class="col-sm-12">
			  <div class="form-group">
			  
			  <div class="col-sm-8">
				Mensagem:
				  <textarea name="texto" rows="5" maxlength="1000" class="input-sm form-control" placeholder="Digite a sua mensagem aqui" required=""></textarea >
				</div>	
				
			  </div>
			</div>
          	
				<div class="col-sm-12">
			  <div class="form-group">
				<div class="col-sm-6 col col-xs-6 text-left">
				  <button type='button' onclick="Voltar()" class='btn  btn-info'><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
				</div>
				<div class="col-sm-2 col col-xs-6 text-right"> 
				  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Enviar</button>
				</div>
				
				</div>
			  </div>
			</form>
        </div>
		</div>
 </div>
 </div>
 </div>
    
    <?php 

if(isset ($_POST['Enviar'])){
    
    $assunto = $_POST['assunto'];
    $texto = $_POST['texto'];
    $idUsuario = $_SESSION['usuarioId'];
    $data=Date('Y-m-d h:i:s');


				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				 $inserir = mysql_query("INSERT INTO mensagens (idUsuario,assunto, mensagem,data) VALUES ('$idUsuario','$assunto','$texto', '$data')");
               
				if($inserir){
				$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															A mensagem foi enviada com successo!
														</div>
												   	</div>";
				}else{
					$_SESSION['mensagem'] = "
													<div class='col-md-9 col-md-offset-0'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Mensagem não enviada! $idUsuario
														</div>
												   	</div>";
													echo mysql_error();
				}
				//Manda o usuario para a tela de login
				header("Location: mensagens.php");

		
		}



?>
    
<?php
	include_once("rodape.php");
?>