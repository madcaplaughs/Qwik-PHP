<?php
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt

Runs the snippet for testing
*/

class run{
	
	function __execute(){
		$ctorun = $_POST["tbxCode"];
		
		$this->removeTempFile();
		
		$tempfile = $this->generateTempFileName();
		
		$this->writetoTempFile($tempfile,$ctorun);
		
		$this->updateTempFileName($tempfile);
		
		echo $this->renderCommand($tempfile);
	}
	
	function removeTempFile(){
		if (isset($_SESSION['tmpfilename'])){
			$fordel = $_SESSION['tmpfilename'];
			if (file_exists($tempdir.$fordel.".php")) unlink($tempdir.$fordel.".php");
		}
	}
	
	function generateTempFileName(){
		$timezone = "Asia/Calcutta";
		$tempfilename = base64_encode(date(DATE_RFC822));
		$tempfilename = preg_replace("/=|,|&|%|@|#/i","",$tempfilename);
		$tempfilename.=rand();
		
		return $tempfilename;
	}
	
	function writetoTempFile($tempfilename,$ctorun){
		$fp = fopen(tPath.$tempfilename.'.php', 'w+');
		//fwrite($fp, '<?php ' . str_replace("\\","",$_POST['tboxCode']));
		fwrite($fp, '<?php ' . $ctorun);
		fclose($fp);
	}
	
	function updateTempFileName($tempfilename){
		$_SESSION['tmpfilename'] = $tempfilename;
	}
	
	function renderCommand($tempfile){
		header("Content-type: text/plain");		
		return '{"run" : function(){  
			$("#modeCode").css("display","none");
			$("#modeDisplay").css("display","none");
			$("#modeResult").css("display","block");
			$("#btnRun").html("Done");
			
			document.getElementById(moderesult).src="'.tPath.$tempfile.'.php";
		}}';
	}
	
}