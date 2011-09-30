<?php
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt

Saves the snippets
*/

class save{
	
	var $currentdate = "";
	var $filever = ""; //file version
	
	function __execute(){
		$args = func_get_arg(0);
		if (array_key_exists(1,$args)):
			$filename=str_replace(" ","_",$args[1]);
			$this->currentdate = date(DATE_RFC822);
			
			clearstatcache();
			
			$this->createFileBase($filename);
			
			$this->dotheMetaMeat($filename);
			
			$this->saveFile($filename);
			
			alert("$filename has been saved!");
		else:
			alert("Please Give a Name!");			
		endif;
	}
	
	function createFileBase($filename){
		if (!$dh = @opendir(rePath.$filename)){
			mkdir(rePath.$filename,0777);
		}
	}
	
	function dotheMetaMeat($filename){
		$meta=array();
		$newmeta="";
		$this->filever=0;
		if (file_exists(rePath.$filename.'/meta.lu')){
			//get last commint
			//$meta = intval(file_get_contents($saverootdir.$filename.'/meta.lu'));
			$meta = file(rePath.$filename.'/meta.lu');
			$meta[0]=intval($meta[0])+1;	
			$this->filever=$meta[0];
			$meta[0] .="\n";
			foreach($meta as $eline)
				$newmeta .= $eline;
			$newmeta .= "\nCommit Value: $this->filever | Date Save: $this->currentdate";		
		}else{
			//update meta info and save it
			$this->filever = 1;
			$newmeta="1\nCommit Value: 1 | Date Saved: $this->currentdate";	
		}
		file_put_contents(rePath.$filename.'/meta.lu',$newmeta);
	}
	
	function saveFile($filename){
		file_put_contents(rePath.$filename.'/'.$this->filever.'.php',gzcompress($_POST['tbxCode'],9));
	}
}