<?php 

require 'db.php';
session_start();

$email = $_POST['email'];
$pass = $_POST['password'];
$rememberme = $_POST['rememberme'];



$sql = "SELECT * FROM user WHERE `email` = '$email' AND `password` = '$pass'";

$act = $db->query($sql);
$row = mysqli_num_rows($act);

foreach ($act as $key) {
    $userID =$key['userid'];
	$name = $key['name'];
	$professional = $key['professional'];
    $image = $key['image'];
    $aboutme = $key['aboutme'];
}

if($row >= 1){
	if($rememberme == 'check'){
		setcookie('login', 'yes', time() + (86400 * 30), "/");
		setcookie('userID',$userID, time() + (86400 * 30), "/");
		setcookie('name', $name, time() + (86400 * 30), "/");
		setcookie('email',$email, time() + (86400 * 30), "/");
		setcookie('professional', $professional, time() + (86400 * 30), "/");
		setcookie('image',$image, time() + (86400 * 30), "/");
		setcookie('aboutme', $aboutme, time() + (86400 * 30), "/");
	}

	$_SESSION['userID'] = $userID;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$_SESSION['professional'] = $professional;
	$_SESSION['image'] = $image;
	$_SESSION['aboutme'] = $aboutme;

	header('Location: user/index.php');

} else {
	$_SESSION['error'] = 'ID / Password is not match';

	header('Location: login.php');
}


?>