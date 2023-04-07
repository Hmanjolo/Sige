<?php
//session_start();
include_once("principal.php");
include_once("seguranca.php");
include_once("conexao.php");

    $ID=$_POST['ID'];
    $Nome = $_POST['Nome'];
    $Apelido = $_POST['Apelido'];
    $Email = $_POST['Email'];
    $Contacto = $_POST['Contacto'];
    $DOB = $_POST['DOB'];
    $BI = $_POST['BI'];
    $Sexo = $_POST['Sexo'];
    $Estado = $_POST['Estado_Civil'];
    $Pais = $_POST['Pais'];
    $Naturalidade = $_POST['Naturalidade'];
    $Bairro = $_POST['Bairro'];
    $Disciplina = $_POST['Disciplina'];
    $idUsuario= $_POST['idUsuario'];
    
    
    

			if($senha === $confirmacao){

				$senha = md5($_POST["senha"]);

				//Inserindo os dados do formulario usercadastrar na tabela usuarios
				 $inserir = mysql_query("UPDATE funcionario set Nome='$Nome',Apelido='$Apelido', Email='$Email', Contato='$Contacto', DOB='$DOB', BI='$BI', Estado='$Estado', Naturalidade='$Naturalidade', Bairro='$Bairro', Pais='$Pais', Sexo='$Sexo', dataMod=NOW() WHERE ID = '$ID'");
				
                $inserir1 = mysql_query("UPDATE tabela_usuarios set nome = '$Nome $Apelido' ,dataModificacao = NOW() WHERE idUsuario='$idUsuario'");
				//$m=mysql_error();
                if ($inserir==true & $inserir1==true ){
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Dados do funcionario <strong> $Nome </strong> Editados com sucesso! 
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: funcionario-listar.php");
				}else{
					$_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-danger' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Erro ao editar os dados do funcionario ! ".mysql_error()."
														</div>
												   	</div>";
		
				//Manda o usuario para a tela de login
				header("Location: funcionario-listar.php");
				}
				
				
			}
		
		
	
    
    

    



?>


