<?php

class loadFilefromLink{
	
	function __execute(){
		$url=curPageURL();	
		$try=substr(parse_url($url, PHP_URL_PATH),strrpos(parse_url($url, PHP_URL_PATH),"/")+1);		
		if (!empty($try)) :
			$try = base64_decode($try);
			echo "<script type=\"text/javascript\">__execute('load $try');</script>";
		endif;
	}
	
}