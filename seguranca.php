<?php
ob_start();
if(($_SESSION['usuarioId'] == "") || 
   ($_SESSION['usuarioNome'] == "") ||
   
   ($_SESSION['usuarioLogin'] == "") ||
   ($_SESSION['usuarioSenha'] == "") ||
   ($_SESSION['usuarioNivelAcesso'] == "")){
    unset
        ($_SESSION['usuarioId'],			
		  $_SESSION['usuarioNome'], 		 
       
		  $_SESSION['usuarioId'], 		
		  $_SESSION['usuarioSenha'],
          $_SESSION['usuarioNivelAcesso']);
    
	//Mensagem de Erro
	$_SESSION['loginErro'] = "<div class='alert alert-danger' role='alert'> 
							  	<strong>Erro:</strong> 
							  		<ul>
							  			<li>
							  				Área restrita para usuários cadastrados
							  			</li>
							  		</ul>
							  </div>";
	
	//Manda o usuário para a tela de login
	header("Location: index.php");
}