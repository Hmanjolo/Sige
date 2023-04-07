<?php

include_once("principal.php");
include_once("menu2.php");
	
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Re</title>
        <meta name="description" content="Login" />
        <meta name="keywords" content="Login" />
        <meta name="author" content="Haggy Tomas Manjolo" />
        <link rel="stylesheet" type="text/css" href="css/style-login.css" />
        <script src="js/modernizr.custom.63321.js"></script>
		<style>
		</style>
    </head>
    <body>
         <div class="col-sm-9 col-md-9">

            <div class="panel panel-default panel-table">
	

         <?php 
session_start(); 
$link = array(  
                1=>"teste1.php", 
                2=>"teste2.php", 
                3=>"#", 
                4=>"#", 
                5=>"#" 
                 ); 
$rand = $_SESSION['link'] = !isset($_SESSION['link'] ) ? rand(1, count( $link) ) : $_SESSION['link']; 
header("location: {$link[$rand]}");  
?>
	
			
			
        </div>
             </div>
		
    </body>
</html>
