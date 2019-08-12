<?php 


session_start();

require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['type'];
$pass = $_POST['password'];
$confirm = $_POST['confirmpassword'];
$about = $_POST['aboutme'];

if($pass != $confirm){
	$_SESSION['error'] = 'Password not match';
	header('Location: registation.php');
}


$filetemp = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$path = pathinfo($filename);
$target = "images/user/".basename($filename);
 


$sql1 = "SELECT userid FROM user WHERE `email` = '$email'";
$sql2 = "SELECT userid FROM user WHERE `image ` = '$filename'";
$sql = "INSERT INTO user(name,email,professional,image,password,aboutme) VALUES ('$name','$email','$type','$filename','$pass','$about')";

$act1 = $db->query($sql1);
$row1 = mysqli_num_rows($act1);

$act2 = $db->query($sql2);
$row2 = mysqli_num_rows($act2);

if($row1 >= 1){
	$_SESSION['message'] = 'Email already registered';
    header('Location: registation.php');
}
elseif(row2>=1)
{
	$_SESSION['message'] = 'This Pictre name already Stored in Database';
    header('Location: registation.php');
}
else
{

        if (move_uploaded_file($filetemp, $target) && $db->query($sql)==true) {
            echo "Image succesfully uploaded.";

             $_SESSION['message'] = "Registation for ".$name. " succesfully!!";
            $_SESSION['msg_type'] = "success";
             header('Location: login.php');         

        }elseif($db->query($sql)==false)
            {
                $_SESSION['message'] = "Database Error ".$db->error;
                 $_SESSION['msg_type'] = "danger";
                 header('Location: registation.php');
            }

         else {
            $_SESSION['message']= "Image uploading failed.";
              $_SESSION['msg_type'] = "danger";
             header('Location: registation.php');
        }
    
}
?>
