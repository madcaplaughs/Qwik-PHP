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
 public function clr(){ $this->ob = ""; return $this; }
 public function op(){
   return $this->ob;
 }
}

$b = new a();
//$b->x()->z()->y()->op();

echo $b->z()->x()->op();

$display = function() use($b){
 return $b->clr()->y()->op();
};

echo $display();
