<?php
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt

Loads a snippet
*/

class load{
	
	var $filever=0;
	var $data;
	
	function __execute(){
		$args = func_get_arg(0);		
		if (array_key_exists(1,$args)):
			$filename=str_replace(" ","_",$args[1]);
			clearstatcache();
			
			$fhandle=array();
			$fhandle=explode(",",$filename);
						
			$data="";

			if (array_key_exists(1,$fhandle)):
				if(is_numeric($fhandle[1])):
					$this->filever = $fhandle[1];
					$this->getCode($fhandle[0],$data,$this->filever);
				else:
					$this->$fhandle[1]($fhandle[0]);
				endif;	
			else:		
				$this->getCode($fhandle[0],$data,$this->filever);
			endif;

			echo $this->renderCommand($this->data,$filename);
		else:
			alert("Nothing To Load! Please Enter Filename!");
		endif;
	}
	
	function sharelink(){
		$filename = func_get_arg(0);
		$data = "Share Link: ".bPath.base64_encode($filename);
		$data = yume($data);
		$this->data=$data;
	}
	
	function meta(){
		$filename = func_get_arg(0);
		$data = "Latest Commit #";
		
		$meta=array();
		$meta = file(rePath.$filename.'/meta.lu');
		
		foreach($meta as $eline)
			$data .= $eline;
		
		$data = yume($data);
		
		$this->data = $data;
	}
	
	function getCode($filename, &$data,$fv=0){
		if ($dh = @opendir(rePath.$filename)) :
			if (file_exists(rePath.$filename.'/meta.lu')):
			   if($fv==0) :
					$meta=array();
					$meta = file(rePath.$filename.'/meta.lu');
					
					$fileversion = intval(intval($meta[0]));
				else:
					$fileversion=$fv;
				endif;	
				
				if (!file_exists(rePath.$filename.'/'. $fileversion .'.php')) alert("Invalid File Version",true);
				$data = file_get_contents(rePath.$filename.'/'.$fileversion.'.php');				
				
				//echo $data; exit(0);
				
				$tempdata = $data;
				set_error_handler(array($this,'handleError'));
				try {				
					$data = gzuncompress($data);				
				} 
				catch (ErrorException $e){
					$data = $tempdata;
				}
				restore_error_handler();
				
				$data = yume($data);
				
				//$data = str_replace("\"","\\\"",$data);	
				
				
			else:
				alert("Error Loading File!",true);	
			endif;
		else:
			alert("File Does Not Exists!",true);	
		endif;
		
		$this->data = $data;
	}
	
	function renderCommand($data, $filename){
		header("Content-type: text/plain");		
		return '{"run" : function(){  
			$("#modeCode").css("display","block");
			$("#modeDisplay").css("display","none");
			$("#modeResult").css("display","none");
			$("#btnRun").html("Run");
			
			workingFile="'.$filename.'";
			
			document.getElementById("tboxCode").value = "'.$data.'";
			document.getElementById("tboxCode").focus();
		}}';
	}
	
	function handleError($errno, $errstr, $errfile, $errline, array $errcontext)
	{
		// error was suppressed with the @-operator
		if (0 === error_reporting()) {
			return false;
		}
	
		throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	}
}