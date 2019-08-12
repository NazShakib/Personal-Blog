<html>

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


    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Register Form</h5>

                        <form action="regDB.php" method="POST" enctype="multipart/form-data">


                            <div class="form-label-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" required autofocus> <br>
                            </div>

                            <div class="form-label-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required autofocus> <br>
                            </div>

                            <div class="form-label-group">
                                <label for="name">Professional</label>
                                <br>
                                <select name="type" class="form-control" required autofocus>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="busniess">Busniess Man</option>
                                    <option value="developer">Developer</option>
                                    <option value="draphics">Graphics Designer</option>
                                    <option value="engineer">Software Engineer</option>
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
                                <input type="password" class="form-control" name="password" required autofocus> <br>
                            </div>


                            <div class="form-label-group">
                                <label for="conPassword">Confrim Password</label>
                                <input type="password" class="form-control" name="confirmpassword" required autofocus> <br>
                            </div>


                            <div class="form-group">
                                <label for="aboutme">About You</label>
                                <textarea class="form-control rounded-0" name="aboutme" required autofocus rows="3"></textarea>
                            </div>



                            <hr>


                            <input type="submit" class="btn btn-success col-md-2" name="registration" value="Register">
                            <a href="login.php" class="col-md-2 btn btn-info">Login</a>
                            <a href="index.php" class="col-md-2 btn btn-dark float-right">Go Home</a>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>







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
