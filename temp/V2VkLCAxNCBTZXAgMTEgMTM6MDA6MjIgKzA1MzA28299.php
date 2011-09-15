<?php $auth = "24\tLewis Carroll";
$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
echo "<pre><author id='$id'>
    <firstname>$first</firstname>
    <surname>$last</surname>
</author></pre>\n";

$auth1 = "div.class#id(style:$style){phpcode}";
$n1 = sscanf($auth1, "%[^.].%[^#]#%s(%s){%s}",$tagname,$class,$id,$attr,$phpcode);
echo "tagname: $tagname<br>class: $class<br>id: $id<br>attr: $attr<br>phpcode: $phpcode";