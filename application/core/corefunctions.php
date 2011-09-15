<?php

if (!function_exists("alert")):
	function alert($toalert,$exit=false){
		echo "{'run' : function(){alert('$toalert');}}";
		if ($exit) exit(0);
	}
endif;

if (!function_exists("curPageURL")) :
	function curPageURL() {
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
	}
endif;

if (!function_exists("yume")):
	function yume($data){
		return preg_replace("/\r?\n/", "\\n", addslashes($data));
	}
endif;