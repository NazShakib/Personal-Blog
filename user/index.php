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
</head>

<body>

    <?php
    session_start();
    require "../db.php";
if(isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?> ">
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

    <?php
        $userID = $_SESSION['userID'];
    
     $sql ="SELECT COUNT(*) AS totalPost FROM post where userid= '$userID'"; 
     $act = $db->query($sql);
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
                                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Admin Panel | HOME</strong></div>
                            </a></div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                            <!-- Log out-->
                            <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <section class="dashboard-counts section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="icon"><i class="icon-padnote"></i></div>
                            <div class="name text-center"><strong class="text-uppercase">Total Post</strong><span>Last 5 days</span>
                                <div class="count-number text-center"><?php
                                    foreach($act as $key)
                                    {}
                                      echo $key['totalPost'];  
                                      ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="wrapper count-title d-flex">
                            <div class="icon text-center"><i class="icon-check"></i></div>
                            <div class="name text-center"><strong class="text-uppercase">Total Comment</strong><span>Last 2 months</span>
                                <div class="count-number text-center">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section>


            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-xl-7 float-left">
                        <div class="card card-signin flex-row my-5">
                            <div class="card-img-left d-none d-md-flex">
                            </div>

                            <div align="center" class="card-body">

                                <h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                NAME
                                            </th>
                                            <th>
                                                EMAIL
                                            </th>
                                            <th>
                                               PROFESSIONAL
                                            </th>
                                            <th>
                                                ABOUT
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($act as $key): ?>
                                            <tr>
                                                <td> <?php echo $_SESSION['userID'] ?> </td>
                                                <td> <?php echo $_SESSION['name'] ?> </td>
                                                <td> <?php echo $_SESSION['email'] ?> </td>
                                                <td> <?php echo $_SESSION['professional'] ?> </td>
                                                <td> <?php echo $_SESSION['aboutme'] ?> </td>
                                                <td>
                                                    <a href="edit_profile.php" type="button" rel="tooltip" title="Edit Task" class="btn btn-info p-2">
                                                        <i class="material-icons">Edit Profile</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

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
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>
