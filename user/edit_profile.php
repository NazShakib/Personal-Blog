<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>

    <?php
    session_start();
if(isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>


    <?php 
    
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
    ?>



    <!-- Side Navbar -->
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center"><img src="../images/user/<?=$_SESSION['image']?>" alt="person" class="img-fluid rounded-circle">
                    <h2 class="h5"><?php echo $_SESSION['name']; ?></h2><span><?php echo $_SESSION['professional']; ?></span>
                </div>

            </div>
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Main</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li><a href="index.php"> HOME </a></li>
                    <li><a href="edit_profile.php">EDIT PROFILE </a></li>
                    <li><a href="post.php">POST ARTICLE</a></li>
                    <li><a href="my_post.php">MY POSTS</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Admin Panel | EDIT PROFILE</strong></div>
                            </a></div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                            <!-- Log out-->
                            <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">EDIT PROFILE</li>
                </ul>
            </div>
        </div>


        <?php 
      require '../db.php';
        
        $uid = $_SESSION['userID'];
        
       $sql = "SELECT * FROM user where userid = $uid";
        $act = $db->query($sql);
        
        foreach ($act as $key) {
  
        }

      ?>



        <section class="mt-30px mb-30px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <div class="card card-signin flex-row my-5">
                            <div class="card-img-left d-none d-md-flex">
                            </div>


                            <div class="card-body">
                                <h5 class="card-title text-center">Update Your Profile</h5>

                                <form action="profile_updatedb.php" method="POST" enctype="multipart/form-data">


                                    <div class="form-label-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $key['name']; ?>" name="name" required autofocus> <br>
                                    </div>

                                    <div class="form-label-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="<?php echo $key['email']; ?>" name="email" required autofocus> <br>
                                    </div>

                                    <div class="form-label-group">
                                        <label for="name">Professional</label>
                                        <br>
                                        <select name="type" class="form-control" required autofocus>
                                            <option value="notchange">No change</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                            <option value="busniess">Busniess Man</option>
                                            <option value="others">Others</option>
                                        </select> <br>

                                    </div>

                                    <div class="input-group form-label-group">
                                        <label for="img" class="col-md-2 float-left">Your Picture</label><br>
                                        <input type="file" name="image" class="form-control col-md-10">
                                    </div>
                                    
                                    <br>

                                    <div class="form-label-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" value="<?php echo $key['password']; ?>" name="password"> <br>
                                    </div>


                                    <div class="form-group">
                                        <label for="aboutme">About You</label>
                                        <textarea class="form-control rounded-0" name="aboutme" required autofocus rows="3"><?php echo $key['aboutme']; ?>
                                        </textarea>
                                    </div>



                                    <hr>


                                    <input type="submit" class="btn btn-info col-md-2" name="registration" value="UPDATE">

                                    <a href="index.php" class="col-md-2 btn btn-danger">CANCEL</a>

                                </form>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>










    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>
