
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



$userid = $_SESSION['userID'];

$title = $_POST['title'];
$category = $_POST['category'];
$tag = $_POST['tags'];
$descriptions = $_POST['postArticle'];
$time =date("j F Y");


$filetemp = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$target = "../images/post/".basename($filename);


  if(file_exists("../images/post/".$filename))
   {
      $_SESSION['message'] = 'Image File Already Exists. Try another one';
	  header('Location: post.php');   
    }




$sql = "INSERT INTO post(post_title,post_category,post_tag,post_image,post_article,post_time,userid) VALUES ('$title','$category','$tag','$filename','$descriptions','$time','$userid')";

   
if ($db->query($sql)==true && move_uploaded_file($filetemp, $target)) {
    echo "Image succesfully uploaded.";

     $_SESSION['message'] = "Registation for ".$name. " succesfully!!";
    $_SESSION['msg_type'] = "success";
     header('Location: index.php');         
    
}elseif($db->query($sql)==false)
    {
        $_SESSION['message'] = "Database Error ".$db->error;
         $_SESSION['msg_type'] = "danger";
         header('Location: post.php');
    }
    
 else {
    $_SESSION['message']= "Image uploading failed.";
      $_SESSION['msg_type'] = "danger";
     header('Location: post.php');
}



?>
