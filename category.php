<!doctype html>
<html lang="en">

<head>
     <title>Busniess Idea Sharing</title>
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
       require "db.php";
          session_start();
    ?>


    <?php include "navigationBar.php"?>


    <!-- END header -->

    <?php 
    
    
     if (isset($_GET['category'])) {
          $category = $_GET['category'];
         $_SESSION['category'] = $_GET['category'];
   
    } else {
        
      if(!isset($_SESSION['category']))
         {
            $category = 'Technology';
         }
         else
         {
             $category =$_SESSION['category'];
         }    
         
    }
     if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }
    
    $results_per_page = 4;
    $sql="SELECT * FROM post where post_category ='$category'";
    $result = $db->query($sql);
    $number_of_results = mysqli_num_rows($result);
    $number_of_pages = ceil($number_of_results/$results_per_page);
    
    $this_page_first_result = ($page-1)*$results_per_page;
    $sql="SELECT * FROM post where post_category ='$category'". 'LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
    $result = $db->query($sql); 
    ?>


    <section class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="mb-4">Category: <?php echo $category; ?></h2>
                </div>
            </div>
            <div class="row blog-entries">


                <div class="col-md-12 col-lg-8 main-content">
                    <?php foreach ($result as $row): ?>
                    <div class="row">

                        <div class="col-md-8 ml-4">

                            <div class="post-entry-horzontal">
                                <a href="blog-single.php?post=<?php echo $row['post_id']; ?>">
                                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(images/post/<?php echo $row['post_image']; ?>"></div>
                                    <span class="text">
                                        <div class="post-meta">
                                            <span class="category"><?php echo $row['post_category']; ?></span>
                                            <span class="mr-2"><?php echo $row['post_time']; ?> </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                        <h2><?php echo $row['post_title']; ?></h2>
                                    </span>
                                </a>
                            </div>
                            <!-- END post -->

                        </div>

                    </div>
                    <?php endforeach ?>

                    <div class="row">
                        <div class="col-md-12 text-center ml-10">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="category.php?page=<?php echo $page=1; ?>">Prev</a></li>

                                    <li class="page-item">
                                        <?php for ($page=1;$page<=$number_of_pages;$page++) { ?>
                                        <a class="page-link " href="category.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                        <?php } ?>
                                    </li>

                                    <li class="page-item"><a class="page-link" href="category.php ?page=<?php echo $page-1; ?>">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>



                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Technology <span>(12)</span></a></li>
                            <li><a href="#">Commercial <span>(22)</span></a></li>
                            <li><a href="#">Sports <span>(37)</span></a></li>
                            <li><a href="#">Busniess <span>(42)</span></a></li>
                            <li><a href="#">Educational<span>(14)</span></a></li>
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            <li><a href="#">Money</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Investment</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Buy</a></li>
                        </ul>


                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <?php include "footer.php"?>

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
