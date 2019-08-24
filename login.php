<!doctype html>
<html lang="en">

<head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<?php require "db.php" ?>

<?php
    session_start();
if(isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>" >
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Login Form</h5>
                        <form action="logindb.php" method="post">

                            <div class="form-label-group">
                                <label for="inputUserame">Email</label>
                                <input type="email" class="form-control" name="email" required autofocus> <br>
                            </div>
                            <div class="form-label-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required autofocus> <br>
                            </div>
                            <input type="checkbox" name="rememberme" value="check"> Remember Me <br>

                            <hr>
                            <input type="submit" class="btn btn-success col-md-2" name="login" value="Login">
                            <a href="registation.php" class="col-md-2 btn btn-info">Register</a>
                            <a href="index.php" class="col-md-2 btn btn-dark float-right">Go Home</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


      <?php 
       
       unset($_SESSION['category']);
       
    ?>
    

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>


    <script src="js/main.js"></script>
</body>

</html>
