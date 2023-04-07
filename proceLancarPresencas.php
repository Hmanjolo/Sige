<?php
session_start();
include_once("conexao.php");

$id_estudante = $_POST['id_estudante'];
$id_relacao = $_POST['id_relacao'];
$bimestre = $_POST['bimestre'];
$id_conteudo = $_POST['id_conteudo'];
$id_presenca = $_POST['id_presenca'];
$presente = $_POST['presente'];

try {

        $sql = " DELETE FROM `presencas` WHERE id_estudante = '$id_estudante' AND `id_relacao` = '$id_relacao' AND `id_conteudo` = '$id_conteudo'";
        $query=mysql_query($sql);	
        $sql = " INSERT INTO `presencas`(`id_relacao`, `id_conteudo`, `id_estudante`, `presente`) VALUES ('$id_relacao','$id_conteudo','$id_estudante','$presente')";
    
    
    $query=mysql_query($sql);	
    echo "Notas atualizadas com sucesso!";
} catch (Exception $e) {
    print($e);
}

?>