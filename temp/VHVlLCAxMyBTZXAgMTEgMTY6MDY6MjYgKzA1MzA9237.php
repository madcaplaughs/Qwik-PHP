<?php $i=0; $a=array("drf","","ewrw","","234","distinct","raghu");
$ii=0; $finaltags="";
do{
$tags=trim($a[$ii]);
if (! empty($tags) || $tags!=""){
  $finaltags .= "$tags, ";
  $i++;
}
$ii++;
} while($i < 3)

if (strlen($finaltags) > 0)
    $finaltags = substr($finaltags,0,strlen($finaltags)-2);

echo $finaltags;