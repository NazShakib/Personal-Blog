<?php 

require "../db.php";
session_start();

if (isset($_GET['p'])) {
  $postId = $_GET['p'];
}
    
$sql ="DELETE FROM post WHERE post_id = '$postId'";


if($db->query($sql)==true)
{
     $_SESSION['message'] = "Post Deleted for ".$postId. " succesfully!!";
     $_SESSION['msg_type'] = "success";
     header('Location: my_post.php');  
    
}
else
{
    $_SESSION['message']= "An error Occured";
      $_SESSION['msg_type'] = "danger";
     header('Location: my_post.php');
}

?>