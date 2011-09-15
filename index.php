<?php 
session_start();

 if (file_exists('./config.php'))
    require_once './config.php';
 else
 	die("Fata Error: Application Could Not Load");		
		
 require_once $engine . ".php";		
