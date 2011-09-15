<?php $ch = curl_init("http://localhost:1338/");

curl_setopt($ch, CURLOPT_HEADER, 0);

$d = curl_exec($ch);
curl_close($ch);