<?php $auth = "24\tLewis Carroll";
$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
echo "<pre><author id='$id'>
    <firstname>$first</firstname>
    <surname>$last</surname>
</author></pre>\n";