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



$postID = $_SESSION['post_id'];
$user = $_SESSION['userID'];

$sql2 = "select * from post where post_id ='$postID'";

$act = $db->query($sql2);  


 
foreach ($act as $key) {
    
    $category1=$key['post_category'];
    $tag1 = $key['post_tag'];
    $image1 = $key['post_image'];
    
  
}

$title = $_POST['title'];
$category = $_POST['category'];

if($_POST['category']=="nochange_category")
{
  $category = $category1; 
}
else
{
   $category = $_POST['category'];  
}

if($_POST['tags']=="nochange_tag")
{
  $tag = $tag1; 
}
else
{
   $tag = $_POST['tags'];  
}

$descriptions = $_POST['postArticle'];
$time =date("j F Y");

$filecheck = $_FILES['image']['name'];

if($filecheck==null)
{
  $filename = $image1;
}
else
{
$filetemp = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$target = "images/user/".basename($filename);
}




$sql = "UPDATE post SET post_title='$title',post_category='$category',post_tag='$tag',post_image='$filename',post_article='$descriptions',post_time='$time' WHERE post_id='$postID'";


if($filecheck==null && $db->query($sql)==true)
{  
    $_SESSION['message'] = "Post Update for ".$title. " succesfully!!";
            $_SESSION['msg_type'] = "success";
            unset($_SESSION['post_id']);
            header('Location: my_post.php'); 
}
   
elseif ($db->query($sql)==true && move_uploaded_file($filetemp, $target)) {
    
     unset($_SESSION['post_id']);
     $_SESSION['message'] = "Post Update for ".$title. " succesfully!!";
     $_SESSION['msg_type'] = "success";
     header('Location: my_post.php');         
    
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
