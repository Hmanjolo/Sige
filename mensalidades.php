<?php
include_once("principal.php");
$idUsuario=$_SESSION['usuarioId'];
$idEstudante=$_GET['idEstudante'];
$Ano=2018;
$Mes=$_GET['Mes'];
$Estado=$_GET['A'];

if ($Estado==1) {
	if ($_SESSION['usuarioNivelAcesso']=='5' or $_SESSION['usuarioNivelAcesso']=='1') {
		$Estado='';
	}else $_SESSION['mensagem']="Para anular o pagamento da mensalidade entre em contato o Chefe da Secretaria!";
    
}else $Estado=1;


$resultado = mysql_query("SELECT * from mensalidades WHERE idEstudante='$idEstudante' && Ano=$Ano LIMIT 1");


    if (mysql_num_rows($resultado) <= 0) {
            $sql = mysql_query("INSERT INTO mensalidades (idEstudante, Ano, idUsuario,$Mes) VALUES ('$idEstudante', '$Ano', '$idUsuario','1')");
            $sql1 = mysql_query("INSERT INTO `notificacoes` (`Titulo`, `Texto`, `id_Usuario`, `id_Destinatario`, `Data`, `Estado`) VALUES ('Mensalidade', 'A sua mensalidade do mes $Mes foi confirmada!', '$idUsuario', '$idEstudante', NOW(), '1')");
        if (mysql_affected_rows() > 0 ){
        	
        }else {
        $_SESSION['mensagem'] ="
                                                    <div class='col-md-9 col-md-offset-0'>
                                                        <div class='alert alert-danger' role='alert'>
                                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                            ".mysql_error()."
                                                        </div>
                                                    </div>
                                                ";
            
        }
    }else{

           $sql = mysql_query("UPDATE mensalidades SET $Mes = '$Estado' WHERE mensalidades.idEstudante = '$idEstudante' and Ano=$Ano");
            if (mysql_affected_rows() > 0 ){
            if($Estado==''){
            	$sql1 = mysql_query("INSERT INTO `notificacoes` (`Titulo`, `Texto`, `id_Usuario`, `id_Destinatario`, `Data`, `Estado`) VALUES ('Mensalidade', 'A sua mensalidade do mes $Mes foi Anulada, para mais detalhes contactar a secretaria!', '$idUsuario', '$idEstudante', NOW(), '1')");
            }elseif ($Estado==1) {
            	$sql1 = mysql_query("INSERT INTO `notificacoes` (`Titulo`, `Texto`, `id_Usuario`, `id_Destinatario`, `Data`, `Estado`) VALUES ('Mensalidade', 'A sua mensalidade do mes $Mes foi confirmada!', '$idUsuario', '$idEstudante', NOW(), '1')");
            }
    }else {
        $_SESSION['mensagem'] ="
                                                    <div class='col-md-9 col-md-offset-0'>
                                                        <div class='alert alert-danger' role='alert'>
                                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                            ".mysql_error().' '.$_SESSION['mensagem']."
                                                        </div>
                                                    </div>
                                                ";
            
            
        }
}
            header("Location: verMensalidades.php");
