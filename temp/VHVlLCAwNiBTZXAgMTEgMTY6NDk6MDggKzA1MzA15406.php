<?php ob_start();
session_write_close();
session_id('my1session');
session_start();
echo ini_get('session.name').'<br>';
echo '------------------------<br>';
$_SESSION['value'] = 'Hello world!';
echo session_id().'<br>';
echo $_SESSION['value'].'<br>';
session_write_close();
session_id('my2session');
session_start();
$_SESSION['value'] = 'Buy world!';
echo '------------------------<br>';
echo session_id().'<br>';
echo $_SESSION['value'].'<br>';
session_write_close();
session_id('my1session');
session_start();
session_write_close();
session_id('my2session');
session_start();
echo '------------------------<br>';
echo $_SESSION['value']."<br>";
session_write_close();
session_id('my2session');
session_start();
echo '------------------------<br>';
echo $_SESSION['value'];
ob_end_flush();