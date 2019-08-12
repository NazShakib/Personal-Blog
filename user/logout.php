<?php 

session_start();

unset($_COOKIE['userID']);
setcookie('id',null,-1);

unset($_COOKIE['name']);
setcookie('name',null,-1);

unset($_COOKIE['email']);
setcookie('email',null,-1);

unset($_COOKIE['professional']);
setcookie('professional',null,-1);

unset($_COOKIE['image']);
setcookie('image',null,-1);

unset($_COOKIE['aboutme']);
setcookie('aboutme',null,-1);


session_destroy();

header('Location: ../login.php');
?>
