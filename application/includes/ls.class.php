<?php

class ls{
	
	function __execute(){
		$data .="Listing All Snippets<br><Br>";
		$handle = opendir(rePath);
		while (false !== ($file = readdir($handle))) {
		  if ($file != "." && $file != "..") {
			if ($dh = @opendir(rePath.$file)){
			  $data .= "<b>$file</b>, Commits: #, Share Link: <a href='".bPath.base64_encode($file)."' target='_blank'>Open</a>&nbsp;<span id='".rand()."' class='multiple' style='text-decoration:underline;color:blue'><div style='display:none'>".bPath.base64_encode($file)."</div>Copy</span><br>";
			}
		  }					 
		}
		/*$data .= "<script type=\"text/javascript\">init();</script>"; */
		closedir($handle);
		
        $data = yume($data);
		
		echo $this->renderCommand($data);       
	}	
	   
    function renderCommand($torender){
		return '{"run" : function(){
				$("#modeDisplay").css("display","block");
				$("#modeResult").css("display","none");
				$("#modeCode").css("display","none");
				$("#btnRun").html("Close");
				document.getElementById("tboxDisplay").innerHTML="'.$torender.'";
			}}';
    }
	
}