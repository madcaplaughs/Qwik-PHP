<?php ob_start();
session_write_close();

session_id('my1session');
session_start();
echo '------------------------<br>';
echo $_SESSION['value']."<br>";
session_write_close();
session_id('my2session');
session_start();
echo '------------------------<br>';
echo $_SESSION['value'];
session_write_close();
ob_end_flush();