<?php class a{
 public function x(){
   return $this->"i am x<br>";
 }
 public function y(){
   return "i am y<br>";
 }
 public function z(){
   return "i am z<br>";
 }

}


echo a::x()->z()->y();

