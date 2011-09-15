<?php function a(){echo "i am a";}
class b{
  function b(){
    a();
  }
}

$c=new b();