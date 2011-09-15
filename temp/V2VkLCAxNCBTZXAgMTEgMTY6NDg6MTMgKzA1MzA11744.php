<?php $auth = "24\tLewis Carroll";
$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
echo "<pre><author id='$id'>
    <firstname>$first</firstname>
    <surname>$last</surname>
</author></pre>\n";

$auth1 = 'div#box4.a456(style:$style){{for ($i=0; $i < 10; %i++){ echo "i am now $i"; } if ($true) { echo $i; echo $ohmywife; } }}';
$n1 = sscanf($auth1, "%[^.].%[^#]#%[^(](%[^)]){%s}",$tagname,$class,$id,$attr,$phpcode);
echo "tagname: $tagname<br>class: $class<br>id: $id<br>attr: $attr<br>phpcode: $phpcode";

preg_match("/^(\w*)\(/",$auth1,$matches);

echo "<pre>";
print_r($matches);
echo "</pre>";