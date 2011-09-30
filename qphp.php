<?php 
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt
*/


//some paths
define('rPath','./'); //root path
define('bPath', 'http://localhost/qphp/'); // base path for static content
define('tPath','./temp/'); //temp path
define('rePath','./repo/'); //repo path

require_once rPath."application/core/corefunctions.php";

function __autoload($classname){
    if (file_exists(rPath . 'application/includes/' . $classname . '.class.php')) :
        require_once rPath . 'application/includes/' . $classname . '.class.php';
    elseif (file_exists(rPath . 'application/plugins/' . $classname . '.php')) :
        require_once rPath . 'application/plugins/' . $classname . '.php';    
    else :
        echo 'Application Error: '.$classname;
        exit(0);
    endif;
}

/*$timezone = "Asia/Calcutta";
echo  date(DATE_RFC822)."<br>";
$tempfilename = base64_encode(date(DATE_RFC822));
$tempfilename = preg_replace("/=|,|&|%|@|#/i","",$tempfilename);
echo $tempfilename;*/

$action = (isset($_POST["todo"])) ? $_POST["todo"] : "";

$action = explode(" ",$action);

if (!empty($action[0])) :
	$do = new $action[0]();
	$do->__execute($action);
endif;

if (isset($_POST['exec_Cmd'])) exit(0);

require_once rPath . "application/views/".LoadView.".php";