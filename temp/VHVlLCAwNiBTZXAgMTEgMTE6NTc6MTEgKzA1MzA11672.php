<?php class a{
 var $ob="";
 public function x(){
   $this->ob .= "i am x<br>";
   return $this;
 }
 public function y(){
   $this->ob .= "i am y<br>";
   return $this;
 }
 public function z(){
   $this->ob .= "i am z<br>";
   return $this;
 }
 public function op(){
   echo $this->ob;
   return $this;
 }
}

$b = new a();
$b->x()->z()->y()->op();

