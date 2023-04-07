<?php
  include_once("principal.php");
  include_once("conexao.php");
include_once("seguranca.php");?>
  <link rel="stylesheet" href="css/style2.css">
  
<br><br>
<br><br>
<body>
 
  <body>
  
  
  
  
  <div class="col-sm-3 col-md-3">
  
<div class="container">
	<section id="content">
		<form action="">
			
			
			<div class="panel-heading">
              <?php if ($_SESSION['usuarioNivelAcesso']=="4"){?><h1 class="panel-title">MENU ESTUDANTE</h1>
            </div>
      
			<div class="panel-body">
             <div class="panel-heading">
                        <h4 class="panel-title"> 
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user"></span>  Portal do Estudante</a>
                        
						</h4>
                    </div>
                    
                <div id="collapseTwo" class="panel-collapse collapse">
                <ul><li><a href="selecinaTurmaAluno.php?usuarioId=<?php echo $_nome['usuarioId'] ?>">Notas de Frequencia</a></li>
                <li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Exame</a></li>
                <li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Situação Financeira</a></li>
                <li><a href="prepara-se.php#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Testes Online</a></li>
        
                </ul>
                </div>
                    
                 <?php } ?>  
				 <!--Nivel 3 -->
				  <?php if ($_SESSION['usuarioNivelAcesso']=="3"){?><h1 class="panel-title">MENU PROFESSOR</h1>
            </div>
      
			<div class="panel-body">
             <div class="panel-heading">
                        <h4 class="panel-title"> 
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user"></span>  Portal do Professor</a>
                        
						</h4>
                    </div>
                    
                <div id="collapseTwo" class="panel-collapse collapse">
                <ul><li><a href="selecinaTurmaClasse.php?usuarioId=<?php echo $_nome['usuarioId'] ?>">Notas</a></li>
                <li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Exames</a></li>
                <!--<li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Situação Financeira</a></li> -->
                <li><a href="prepara-se.php#?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Testes Online</a></li>
        
                </ul>
                </div>
                    
                 <?php } ?>  
                    
                <div class="panel-heading">
                <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-file"></span>  Personalizações</a>
                        
                </h2>
                    </div>
                <div id="collapseThree" class="panel-collapse collapse">
                        
                 <ul><li><a href="perfil.php?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Dados pessoais</a></li>
                     <li><a href="senha.php?usuarioId=<?php echo $_SESSION['usuarioId'] ?>">Alterar Senha</a></li>
                                    </ul>
                                
                            </table>
                        </div>
                    </div>
                    </div>
			
		</form><!-- form -->	
	</section><!-- content -->
	</div><!-- container -->



</body>
  
    <script src=""></script>
          <?php
    
?>