<?php class a{
 static $ob="";
 public function x(){
   $this->ob .= "i am x<br>";
   return $this;
 }
 public function y(){
   $this->ob .= "i am y<br>";
   return $this;
 }
 public static function z(){
   self::$ob .= "i am z<br>";
   return self::$ob;
 }
 public static function op(){
   return self::$ob;
   //return self;
 }
}

//$b = new a();
//$b->x()->z()->y()->op();

echo a::z()->op();

