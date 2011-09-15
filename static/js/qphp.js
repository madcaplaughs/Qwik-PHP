// QPHP 
	var workingFile="";
    var tmpfilename="";
	var response="";
	
	function __execute(action){
			if(!action) action=document.getElementById("exec_Cmd").value;
			var jqxhr = $.post("./", {todo:action,exec_Cmd:1,tbxCode:document.getElementById("tboxCode").value},function(data) {
				//alert(data);	
				//document.getElementById("tboxCode").value=data;			
				tmpfilename=eval("(" + data + ")");
		    });
   			jqxhr.complete(function(){					
				//alert("Sdf");
				//$.post("cleantmpfile.php", {tboxCode:document.getElementById("tboxCode").value});
				tmpfilename.run();
			});
		}
	
  	$(document).ready(function(){		
		var addH =  $(document).height() - document.getElementById("topbar").offsetHeight - (document.getElementById("actionarea").offsetHeight)
		//alert(addH);
		document.getElementById("tboxCode").style.height = (document.getElementById("actionarea").offsetHeight - document.getElementById("tboxCode").offsetHeight) + addH + "px";
		document.getElementById("tboxResult").style.height = (document.getElementById("actionarea").offsetHeight - document.getElementById("tboxCode").offsetHeight) + addH + "px";	
		document.getElementById("tboxDisplay").style.height = (document.getElementById("actionarea").offsetHeight - document.getElementById("tboxCode").offsetHeight) + (addH-20) + "px";	
		
		
		$("#btnExec").click(function(){
			/*$("#modeCode").css("display","none");
			$("#modeDisplay").css("display","block");
			$("#modeResult").css("display","none");
			$("#btnRun").html("Close");
			var jqxhr = $.post("exec.php", {exec_Cmd:document.getElementById("exec_Cmd").value},function(data) {
				tmpfilename=data;
		    });
   			jqxhr.complete(function(){					
				document.getElementById("tboxDisplay").innerHTML=tmpfilename;
				//$.post("cleantmpfile.php", {tboxCode:document.getElementById("tboxCode").value});
			});
			tmpfilename="";*/
			__execute();
		});		
		
		$("#btnRun").click(function(){
			if ( $(this).html() == "Run" ) {
				$("#modeCode").css("display","none");
				$("#modeDisplay").css("display","none");
				$("#modeResult").css("display","block");
				$(this).html("Done");
				//setTimeout('document.getElementById("tboxResult").src="./qphp.php"', 5000);
				var jqxhr = $.post("run.php", {tboxCode:document.getElementById("tboxCode").value},function(data) {
					tmpfilename=data;
			    });
				jqxhr.complete(function(){					
					document.getElementById("tboxResult").src="./" + tmpfilename + ".php";
					//$.post("cleantmpfile.php", {tboxCode:document.getElementById("tboxCode").value});
				});
			}else if ($(this).html() == "Close"){
				$("#modeCode").css("display","block");
				$("#modeDisplay").css("display","none");
				$("#modeResult").css("display","none");
				$(this).html("Run");
				document.getElementById("tboxCode").focus();
			}else{
				$("#modeCode").css("display","block");
				$("#modeDisplay").css("display","none");
				$("#modeResult").css("display","none");
				$(this).html("Run");
				document.getElementById("tboxResult").src="";
				document.getElementById("tboxCode").focus();
			}
		});
		$("#btnSave").click(function(){			
			filename = prompt("Enter Filename under which you want save this snippet:",workingFile);
			if (filename && filename != ''){
				workingFile=filename;
				var jqxhr = $.post("save.php", {tboxCode:document.getElementById("tboxCode").value, fileName:filename},function(data) {
					response=data;
				});
				jqxhr.complete(function(){					
					alert(response);
				});
				document.getElementById("tboxCode").focus()
			}
		});
		$("#btnLoad").click(function(){			
			filename = prompt("Enter snippet name to load:",workingFile);
			if (filename != '' && filename){
				workingFile=filename;
				var jqxhr = $.post("load.php", {fileName:filename},function(data) {
					response=data;
				});
				jqxhr.complete(function(){					
					//alert(response);
					if (response=="404")
						alert("Error: File Could Not Be Opened!");
					else if (response=="405")
						alert("Error: Invalid Load Command!");	
					else
						document.getElementById("tboxCode").value = response;
				});
				document.getElementById("tboxCode").focus()
			}
		});
		$("#btnDocu").click(function(){			
			alert("Documentation Coming Soon!\nClick Run - to run and test the code\nClick Save - to save the file under a desired filename; file versions are created with each save!\nClick Load - to load a saved file; to get version details write the name of file then write comma and meta for example test,meta; to load specific version write filename comma version number, for example test,4; to get the share link write the name of file then write comma sharelink, for example test,sharelink; Please do not user any space!");
		});
		$("#btnAbout").click(function(){			
			alert("Qwik PHP - Beta\nAn Open Source PHP Snippet Manager\nby Debarshi Banerjee, Laddu\nscriptingtheweb.com\nPlease Note: Right now this works best over a local server!");
		});
		$("#btnSource").click(function(){			
		});
		$("#btnClear").click(function(){			
			document.getElementById("tboxCode").value = "";
			document.getElementById("tboxCode").focus()
		});
		document.getElementById("tboxCode").focus()
		
		/*data2 = { 0 : function(){alert (this.A);}, "A" : "hello" };
		
		test = data2;
		
		test[0]();*/
	});
