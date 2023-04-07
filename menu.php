<nav class=" navbar-inverse " onload="" >
  <div class="row-fluid">
      <div class="panel navbar with-nav-tabs navbar-fixed-top" >
        <div class="panel-heading" style="background-color: #3197ef;">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
                                
            </button>
                <a class="navbar-brand" href="inicio.php"><span style="color: #fff; font-size: 25px; "><label> Colégio Alda Ribeiro Corrêa</label></span></span></a>
          </div> 
          <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
    			      <?php 
                  if ($_SESSION['usuarioNivelAcesso']=="1"||$_SESSION['usuarioNivelAcesso']=="2"||$_SESSION['usuarioNivelAcesso']=="5"){ } else{
                ?>
    				      <li ><a href="mensagens.php"><span class="glyphicon glyphicon-envelope" style="color: #ffffff;font-size:18px;"> Contate-nos</span></a></li>
                  <?php 
                      } 
                      $idUsuario=$_SESSION['usuarioId'];
                      $novasNotificacoes=mysql_query("SELECT * FROM `notificacoes` where id_Destinatario='$idUsuario' && Estado='1' ORDER BY Data DESC");
                      $query=mysql_query("SELECT * FROM `notificacoes` where id_Destinatario='$idUsuario' ORDER BY Data DESC");
                  ?>
                      
                </ul>
                <ul class="nav navbar-nav navbar-right nav-pills">
                  <p class="navbar-text pull-right ">
                    <a href="sair.php" ><br>
                      <button type="button" class='btn btn-danger btn-sm'><span class="glyphicon glyphicon-off"></span></button>
                    </a>
                  </p>
                  <p class="navbar-text pull-left"><span style="color: #fff; font-family: 'Lato', Calibri, Arial, sans-serif; ">Nome do Usuário:</span><br>
                    <a href="#">
                      <strong>
                        <label>
                          <span style="color: #fff; text-transform: uppercase; font-family: 'Lato', Calibri, Arial, sans-serif; "><?php echo $_SESSION['usuarioNome']; ?></span>
                        </label>
                      </strong>
                    </a>
                  </p>           
                </ul>
          </div>
        </div>
      </div>
  </div>
</nav>
    

<!-- Inicio Modal Ver Modal -->
<div class="modal fade" id="verNotificacoes" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="submit" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align " ><span class="glyphicon glyphicon-bell"></span> Notificações</h4>
      </div>
      <form name="form" method="POST" action="Usuario-processa-apagarEstudante.php">
        <div class="modal-body">
        <input type="hidden" name="idUsuario" class="form-control" id="id"> <?php if (mysql_num_rows($query)>0) {
         
          while ($verquery=mysql_fetch_assoc($query)) { 
          ?>
          <div <?php if ($verquery['Estado']==1){ ?>
          
          class="alert alert-info"<?php }else{ ?> class="alert alert-default"<?php }
?> ><span class="glyphicon glyphicon-bell"></span>
          <button type="button" data-dismiss="alert" class="close text-center"> <span aria-hidden="true"></span><span class="" style="font-size: 12px;" >Eliminar</span></button>
          <?php  
              echo $verquery['Texto'];
          ?>
          <hr style="margin: 2px ;">
          </div> <?php } 
          }else{ ?>
          <div class="alert alert-info">Não tens nenhuma notificação</div><?php }

            $sql=mysql_query("UPDATE `notificacoes` SET `Estado` = '0' WHERE `notificacoes`.`id_Destinatario` = '$idUsuario'");

          ?>
        </div>
        <div class="modal-footer ">
          <button type="button"  data-dismiss="modal" aria-hidden="true" class="btn btn-primary" ><span class="glyphicon glyphicon-remove"></span> Fechar</button>
        </div>
      </form>
      </div> 
    </div>
  </div> 
        <!-- Fim Modal -->



