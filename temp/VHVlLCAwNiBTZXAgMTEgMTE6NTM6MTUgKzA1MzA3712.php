<?php class a{
 public function x(){
   echo "i am x<br>";
   return $this;
 }
 public function y(){
   echo "i am y<br>";
   return $this;
 }
 public function z(){
   echo "i am z<br>";
   return $this;
 }
}


echo a::x()->z()->y();

