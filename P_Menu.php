<br class="hidden-xs hidden-sm">
<br class="hidden-xs hidden-sm">
<br class="hidden-xs hidden-sm">
<br class="hidden-xs hidden-sm">
<br class="hidden-xs hidden-sm">
<nav class="navbar navbar-default sidebar"  role="navigation" style="z-index: 1;">
  	<div class="container-fluid">
    	<div class="row-fluid">
    		<div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>      
    		</div>
		    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="inicio.php">Início<span style="font-size:20px;" class="pull-right showopacity glyphicon glyphicon-home"></span></a></li>
		 <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "5") { ?>	<li><a href="listar_inscricoes.php?usuarioNivelAcesso=<?php echo $_SESSION[
     'usuarioNivelAcesso'
 ]; ?>"> Inscrições<span style="font-size:20px;" class="pull-right glyphicon glyphicon-plus"></span></a></li> <?php } ?>
		 <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "2" || $_SESSION['usuarioNivelAcesso'] == "5") { ?>        <li><a href="selecinaTurmaEstudante.php?usuarioNivelAcesso=<?php echo $_SESSION[
            'usuarioNivelAcesso'
        ]; ?>"> Aluno <span style="font-size:20px;" class="pull-right glyphicon glyphicon-education"></span></a></li> <?php } ?>
		 <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "2" || $_SESSION['usuarioNivelAcesso'] == "5") { ?>       <li><a href="Instrutor-listar.php?usuarioNivelAcesso=<?php echo $_SESSION[
           'usuarioNivelAcesso'
       ]; ?>"> Professor <span style="font-size:20px;" class="pull-right glyphicon glyphicon-user"></span></a></li> <?php } ?>
		 <?php if ($_SESSION['usuarioNivelAcesso'] == "1") { ?>       <li><a href="funcionario-listar.php?usuarioNivelAcesso=<?php echo $_SESSION[
           'usuarioNivelAcesso'
       ]; ?>"> Funcionários <span style="font-size:20px;" class="pull-right glyphicon glyphicon-user"></span></a></li> <?php } ?>
		 <?php if ($_SESSION['usuarioNivelAcesso'] == "1") { ?>       <li><a href="listarUsuarios.php?usuarioNivelAcesso=<?php echo $_SESSION[
           'usuarioNivelAcesso'
       ]; ?>"> Usuários <span style="font-size:20px;" class="pull-right showopacity glyphicon glyphicon-user"></span></a></li> <?php } ?>
		 <?php if (
       $_SESSION['usuarioNivelAcesso'] == "1" ||
       $_SESSION['usuarioNivelAcesso'] == "2" ||
       $_SESSION['usuarioNivelAcesso'] == "5"
   ) { ?>       <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Gerenciar <span class="caret" ></span><span style="font-size:20px;" class="pull-right glyphicon glyphicon-bookmark
		"></span></a></li> <?php } ?>
		        <div id="collapseTwo" class="panel-collapse collapse" >
		        	<ul class="nav navbar-nav">
		            <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "5") { ?>	<li><a href="Detalhes_Disciplina.php?usuarioNivelAcesso=<?php echo $_SESSION[
     'usuarioNivelAcesso'
 ]; ?>">&nbsp;&nbsp;&nbsp; Disciplina<span style="font-size:20px;" class="pull-right glyphicon glyphicon-pencil"></span></a></li> <?php } ?>
		            <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "2" || $_SESSION['usuarioNivelAcesso'] == "5") { ?>	<li><a href="selecinaTurmaMensalidades.php?usuarioNivelAcesso=<?php echo $_SESSION[
     'usuarioNivelAcesso'
 ]; ?>">&nbsp;&nbsp;&nbsp; Mensalidades<span style="font-size:20px;" class="pull-right glyphicon glyphicon-usd"></span></a></li> <?php } ?>
		        	</ul>
		    	</div>
					<?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "3") { ?>    	<li><a href="selecinaTurmaClasse.php?usuarioId=<?php echo $_SESSION[
         'usuarioId'
     ]; ?>">Notas<span style="font-size:20px;" class="pull-right glyphicon glyphicon-list-alt"></span></a></li> <?php } ?>
	 
	 <?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "3") { ?>    	<li><a href="selecinaTurmaClasse2.php?usuarioId=<?php echo $_SESSION[
         'usuarioId'
     ]; ?>">Presenças<span style="font-size:20px;" class="pull-right glyphicon glyphicon-list-alt"></span></a></li> <?php } ?>

					<?php if ($_SESSION['usuarioNivelAcesso'] == "1" || $_SESSION['usuarioNivelAcesso'] == "3") { ?>     <li><a href="#?usuarioId=<?php echo $_SESSION[
         'usuarioId'
     ]; ?>">Exames<span style="font-size:20px;" class="pull-right glyphicon glyphicon-list-alt"></span></a></li> <?php } ?>
					<?php if ($_SESSION['usuarioNivelAcesso'] == "4") { ?>    	<li><a href="verNotas.php?usuarioNivelAcesso=<?php echo $_SESSION[
         'usuarioNivelAcesso'
     ]; ?>">Notas de Frequencia<span style="font-size:20px;" class="pull-right glyphicon glyphicon-list-alt"></span></a></li> <?php } ?>
					<?php if ($_SESSION['usuarioNivelAcesso'] == "4") { ?>        <li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId']; ?>">Exame<span style="font-size:20px;" class="pull-right glyphicon glyphicon-list-alt"></span></a></li> <?php } ?>
					<?php if ($_SESSION['usuarioNivelAcesso'] == "4") { ?>        <li><a href="#?usuarioId=<?php echo $_SESSION['usuarioId']; ?>">Situação Financeira<span style="font-size:20px;" class="pull-right glyphicon glyphicon-usd"></a></li> <?php } ?>
					<?php if ($_SESSION['usuarioNivelAcesso'] == "3" || $_SESSION['usuarioNivelAcesso'] == "4") { ?>        <li><a href="https://www.cursoemvideo.com/minha-conta/"<?php echo $_SESSION[
            'usuarioId'
        ]; ?>">Testes Online<span style="font-size:20px;" class="pull-right glyphicon glyphicon-globe"></span></a></li> <?php } ?>    
					<li><a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Personalizações<span class="caret"></span> <span style="font-size:20px;" class="pull-right glyphicon glyphicon-wrench"></span></a> </li>      
		        <div id="collapseSeven" class="panel-collapse collapse">
		             <ul class="nav navbar-nav">
		             	<li><a href="perfil.php?login=<?php echo $_SESSION['usuarioLogin']; ?>">&nbsp;&nbsp;&nbsp;Dados pessoais<span style="font-size:20px;" class="pull-right glyphicon glyphicon-cog"></span></a></li>
		                <li><a href="senha-administrador.php?usuarioId=<?php echo $_SESSION['usuarioId']; ?>">&nbsp;&nbsp;&nbsp;Alterar Senha<span style="font-size:20px;" class="pull-right glyphicon glyphicon-barcode"></span></a></li>
		             </ul>
		        </div>  
		      </ul>
		    </div>
  		</div>
  	</div>
</nav>