<?php
/*
Copyright (C) 2011  Debarshi Banerjee, Laddu!
@package Qwik PHP
@License - license.txt

The view!
*/
//config related to LoadView
$viewmode["modecode"]="tboxCode";
$viewmode["moderesult"]="tboxResult";
$viewmode["modedisplay"]="tboxDisplay";
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name="author" content="Debarshi Banerjee, Laddu" />
<meta name="description" content="Qwik PHP is a snippet manager for PHP. Write your code, run it to test it or just save it, share it!" />
<title>Qwik PHP - Snippet Manager - Debarshi Banerjee, Laddu</title>
<script type="text/javascript" src="<?php echo bPath. "static/js/"; ?>jquery.js"/></script>
<?php 
//$js[0][filename]=,js[0][path]=
if (isset($do)) :
	$do->qputJS();
	$do->qputCSS();
endif;
/*for($i=0;$i<count($js);$i++) echo "<script type=\"text/javascript\" src=\"".$js[$i]["path"].$js[$i]["filename"]."\"/></script>";
//<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
if (isset($do)) { for($i=0;$i<count($css);$i++) echo "<link href=\"".$css[$i]["path"].$css[$i]["filename"]."\" rel=\"stylesheet\" type=\"text/css\" />"; } */
?>
<script type="text/javascript">
modecode = "<?php echo $viewmode["modecode"]; ?>";
moderesult = "<?php echo $viewmode["moderesult"]; ?>";
modedisplay = "<?php echo $viewmode["modedisplay"]; ?>";
</script>
<style type="text/css">
body{margin:0; padding:0; width:100%; height:100%; background:#C3C3C3}
.clr{clear:both}
.toplinks,.branding{text-decoration:none; font:Georgia, "Times New Roman", Times, serif; font-size:14px; color:#CCC; padding:6px 10px; cursor:pointer; float:left}
.toplinks:hover{color:#FFF; background-color:#000}
.branding{color:#096;}
</style>
<?php if (isset($do)) echo $do->qHead(); ?>
</head>
<body>
<div style="display:block; width:100%; height:30px; background:#333; color:#CCC;" id="topbar">
	<div style="padding:0 6px; float:left">
      <div class="branding">|Qwik PHP|</div>
      <div class="toplinks" id="btnRun">Run</div>
      <div class="toplinks" id="btnSave">Save</div>
      <div class="toplinks" id="btnLoad">Load</div>
      <div class="toplinks" id="btnClear">Clear</div>
      <div class="toplinks" id="intArea">~$<input type="text" name="exec_Cmd" id="exec_Cmd" style="height:12px" /></div>
      <div class="toplinks" id="btnExec">Execute</div>
      <div class="clr"></div>
    </div>
    <div style="padding:0 6px; float:right">
      <div class="toplinks" id="btnDocu">Documentation</div>
      <div class="toplinks" id="btnAbout">About</div>
      <div class="toplinks" id="btnSource">Source</div>
    </div>
  </div>
  <div id="actionarea">
  	<div style="background-color:#C3C3C3; display:block; width:100%" id="modeCode">
    	<textarea style="width:96%; padding:1%; margin:1%;" name="<?php echo $viewmode["modecode"]; ?>" id="<?php echo $viewmode["modecode"]; ?>" ></textarea>
    </div>
    <div style="background-color:#C3C3C3; display:none; width:100%" id="modeResult">
        <iframe style="width:96%; padding:1%; margin:1%; background-color:#FFF" frameborder="0" id="<?php echo $viewmode["moderesult"]; ?>"></iframe>
    </div>
    <div style="background-color:#C3C3C3; display:none; width:100%; position:relative" id="modeDisplay">
    	<div style="width:96%; padding:1%; margin:1%; background-color:#FFF; position:relative; min-height:96%; overflow:scroll; overflow-x:hidden" id="<?php echo $viewmode["modedisplay"]; ?>">

        </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo bPath. "static/js/"; ?>qphp.js"></script>
  <?php if (isset($do)) echo $do->qBody(); ?>
  <?php
  //this section will later be developed as a part of the plugin manager... now lets just use force
  $someplugin = new loadFilefromLink();
  $someplugin->__execute();
  ?>
</body>
</html>