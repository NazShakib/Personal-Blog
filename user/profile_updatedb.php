<?php 

require "../db.php";
session_start();


   if (!isset($_SESSION['email'])) {
        header('Location: ../login.php');
    }
    if (isset($_COOKIE['login'])) {
       $_SESSION['userID'] = $_COOKIE['userID'];
	   $_SESSION['name'] = $_COOKIE['name'];
	   $_SESSION['email'] = $_COOKIE['email'];
	   $_SESSION['professional'] = $_COOKIE['professional'];
	   $_SESSION['image'] = $_COOKIE['image'];
	   $_SESSION['aboutme'] = $_COOKIE['aboutme'];
    }

$id =$_SESSION['userID'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$about = $_POST['aboutme'];

if($_POST['type']=="notchange")
{
  $type =  $_SESSION['professional']; 
}
else
{
   $type = $_POST['type'];  
}

$filecheck = $_FILES['image']['name'];
if($filecheck==null)
{
  $filename = $_SESSION['image'];
}
else
{
$filetemp = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$target = "images/user/".basename($filename);
}

$_SESSION['name'] = $_COOKIE['name']=$name;
$_SESSION['email'] = $_COOKIE['email']=$email;
$_SESSION['professional'] = $_COOKIE['professional']=$type;
$_SESSION['image'] = $_COOKIE['image']=$filename;
$_SESSION['aboutme'] = $_COOKIE['aboutme']=$about;


$sql = "UPDATE user SET name='$name',email='$email',professional='$type',image='$filename',password='$pass',aboutme='$about' WHERE userid='$id'";

if($filecheck==null && $db->query($sql)==true)
{
       $_SESSION['message'] = "Profile Update for ".$name. "is succesfull!!";
            $_SESSION['msg_type'] = "success";
             header('Location: index.php'); 
}

elseif (move_uploaded_file($filetemp, $target) && $db->query($sql)==true) {
            

             $_SESSION['message'] = "Registation for ".$name. " succesfully!!";
            $_SESSION['msg_type'] = "success";
             header('Location: index.php');         

}elseif($db->query($sql)==false)
{
    $_SESSION['message'] = "Database Error ".$db->error;
    $_SESSION['msg_type'] = "danger";
    header('Location: edit_profile.php');
}

else {
$_SESSION['message']= "Image uploading failed.";
 $_SESSION['msg_type'] = "danger";
header('Location: edit_profile.php');
}







?>
