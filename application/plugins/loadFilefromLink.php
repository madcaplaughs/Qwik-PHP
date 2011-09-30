<?php
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt

A plugin to load a snippet from a sharelink 
*/

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