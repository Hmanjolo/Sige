<?php
	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$conectar = mysql_connect("localhost","root","") or die ("Erro na conexão");
	mysql_select_db("sige")or die ("Base não encontrada");
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
?>