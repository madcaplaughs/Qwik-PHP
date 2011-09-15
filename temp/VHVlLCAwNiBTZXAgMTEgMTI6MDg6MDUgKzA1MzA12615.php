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
 public static function z(){
   $this->ob .= "i am z<br>";
   return self::$ob;
 }
 public static function op(){
   return $this->ob;
   //return self;
 }
}

$b = new a();
//$b->x()->z()->y()->op();

$hello = $b->z()->op();

